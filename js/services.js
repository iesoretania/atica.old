'use strict';

/* Services */

angular.module('aticaApp.services', ['ngResource'], function ($provide) {
  $provide.service('userDataService', ['$resource', '$timeout', function($resource, $timeout) {
    
    var accessToken = "";
    
    var loginService = $resource('api/index.php/v1/auth');
    
    var organizationService = $resource('api/index.php/v1/organization/:organization', {
      organization:'@Id'
    });
    
    var groupingService = $resource('api/index.php/v1/grouping/:groupId');
    
    var snapshotDataService = $resource('api/index.php/v1/snapshotdata/:snapshotId');
    
    var folderService = $resource('api/index.php/v1/folder/:folderId');
    
    var refreshService = $resource('api/index.php/v1/refreshtoken', {
      token:'@token'
    });
    
    var logoutService = $resource('api/index.php/v1/logout', {
      token:'@token'
    });
    
    var categoryService = $resource('api/index.php/v1/category/:categoryId');
    
    var _scope = {};
    
    _scope.profile = null;
    _scope.groupings = {};
    
    var _getGrouping = function(groupId, fnOk, fnError) {
      return groupingService.query({},fnOk, fnError);
    }
    
    var _setOrganization = function(org) {
      
      angular.forEach(_scope.organizations, function(value, key) {
        if (value.id == org) {
          _scope.organization = value;
          
          groupingService.get({
            'guest': value.id,
            'folders': 1
          }, function(e) {
            _scope.profileId = null;
            _scope.profiles = {};
            _scope.profiles[null] = {};
            _scope.profiles[null].profileGroupId = null;
            _scope.profileGroups = {};
            _scope.profileGroups[null] = {};
            _scope.profileGroups[null].groupings = e.groupingsOrder;
            _scope.groupings = e.groupings;
            _scope.folders = e.folders;
          }, function() {});
        }
      });
      
    }
    
    _scope.user = false;
    
    _scope.snapshot = undefined;
    
    _scope.snapshots = undefined;
    
    _scope.organization = undefined;
    
    _scope.organizations = organizationService.query(function(result) {
      if (_scope.organizations.length>0 && angular.isDefined(_scope.organization)==false) {
        _setOrganization(_scope.organizations[0].id);
      }

    }, function() {
      _scope.error = true;
    });
    
    var tokenRefresh = null;
    
    var tokenRefreshRetries = 0;
    
    var doLogout = function() {
      _scope.loaded = false;
      delete _scope.user;
      delete _scope.profileId;
      delete _scope.profileGroups;
      delete _scope.profiles;
      delete _scope.folders;
      delete _scope.groupings;
      delete _scope.events;
      delete _scope.snapshotId;
      delete _scope.loadedSnapshotId;
      delete _scope.categories;
        
      if (tokenRefresh !== null) {
        tokenRefreshRetries = -1;
        $timeout.cancel(tokenRefresh);
        tokenRefresh = null;
      }
      
      var action = new logoutService({
        'token': accessToken
      }).$save();
      
      _setOrganization(_scope.organization.id);
    }
    
    var doTokenRefresh = function() {
      var action;
      action = new refreshService({
        'token': accessToken
      });
      //console.log('Refreshing token...');
      action.$save(function(result) {
        if (result.expiresIn>60) {
          tokenRefresh = $timeout(doTokenRefresh, (result.expiresIn / 2)*1000, false);
          tokenRefreshRetries = 0;
          //console.log('...ok! Next refresh in '+result.expiresIn / 2+' seconds');
        }
      }, function() {
        if (tokenRefreshRetries >= 0) {
          if (tokenRefreshRetries > 5) {
            //console.log('...error! Too many tries, so logging out!');
            $timeout(doLogout, 0);
          }
          else {
            //console.log('...error! Trying again in 30 secs.');
            tokenRefresh = $timeout(doTokenRefresh, 30000, false);
            tokenRefreshRetries = tokenRefreshRetries + 1;
          }
        }
      });
    }
       
    return {
      setOrganization: _setOrganization,
      getScope: function() {
        return _scope;
      },
      getGrouping: _getGrouping,
      getUser: function() {
        return _scope.user;
      },
      getEvents: function() {
        return _scope.events;
      },
      getNews: function() {
        return _scope.news;
      },
      getProfileGroups: function() {
        return _scope.profileGroups;
      },
      getProfiles: function() {
        return _scope.profiles;
      },
      getActivities: function() {
        return _scope.activities;
      },
      getOrganizations: function() {
        return _scope.organizations;
      },
      getDocuments: function() {
        return _scope.documents;
      },
      getCurrentOrganization: function() {
        return _scope.profileGroups[_scope.user.currentProfileGroup].organization;
      },
      login: function(user, pass, snap, okFn, errorFn) {
        var action;
        action = new loginService({
          'username': jQuery.trim(user.toLowerCase()), 
          'password': pass, 
          'organization_id': _scope.organization.id
        });
        var self = this;
        action.$save(function(result) {
          // OK
          //console.dir(result);
          _scope.profileGroups = result.profileGroups;
          _scope.profiles = result.profiles;
          _scope.snapshots = result.snapshots;
          _scope.user = result.userData;
          _scope.snapshotId = result.snapshotId.toString();
          _scope.isAdmin = result.userData.isGlobalAdministrator || result.isLocalAdministrator;
          accessToken = result.accessToken;
          if (result.expiresIn>60) {
            tokenRefresh = $timeout(doTokenRefresh, (result.expiresIn / 2)*1000, false);
          }
          //console.dir(_scope.user);
          tokenRefreshRetries = 0;
          okFn();
        },
        function(e)
        {
          // Error
          errorFn(e);
        });
      },
      logout: doLogout,
      loaddata: function(snapshot, fnOk, fnError) {
        if (snapshot != _scope.loadedSnapshotId) {
          snapshotDataService.get({
            'snapshotId': snapshot, 
            'token': accessToken
          }, function(e) {
            _scope.profiles = e.profiles;
            _scope.profileGroups = e.profileGroups;
            _scope.events = e.events;
            _scope.activities = e.activities;
            _scope.groupings = e.groupings;
            _scope.loaded = true;
            _scope.loadedSnapshotId = snapshot;
            _scope.persons = e.persons;
            _scope.folders = e.folders;
            _scope.user.profileGroups = _.uniq(_.map(_scope.user.profiles[snapshot], function(e) {
              return _scope.profiles[e].profileGroupId;
            }));
            fnOk(e);
          }, function() {
            _scope.loaded = false;
            fnError();
          });
        }
        else {
          fnOk();
        }
      },
      getfolder: function(folderId, guest, fnOk, fnError) {
        var params = {
          'folderId': folderId
        };
        if (guest == false) {
          params.token = accessToken 
        }
        else {
          params.guest = true;
        }
        folderService.get(
          params
          , function(e) {
            fnOk(e);
          }, function() {
            fnError();
          });
      },
      getdownloaddeliveryurl: function (id, id2) {
        var r = "/server/download.php?id="+encodeURI(id)+"&";
        
        if (_scope.loaded) {
          r = r + "token=" + encodeURI(accessToken);
        }
        else {
          r = r + "guest=" + encodeURI(id2);
        }
        
        return r;
      },
      loadcategorytree: function(force, fnOk, fnError) {
        if (force || angular.isDefined(_scope.categories) == false) {
        categoryService.get({
            'snapshotId': _scope.snapshotId, 
            'token': accessToken
          }, function(e) {
            _scope.categories = e.categories;
            _scope.categoriesOrder = e.categoriesOrder;
            fnOk(e);
          }, function() {
            //_scope.cat = false;
            fnError();
          });
        }
        else {
          fnOk();
        }
      }
      
    };
  }]);
  $provide.service('timeAgoService', ['$timeout', function($timeout) {
    var ref;
    return {
      nowTime: 0,
      initted: false,
      settings: {
        refreshMillis: 60000,
        allowFuture: false,
        strings: {
          prefixAgo: "hace",
          prefixFromNow: "dentro de",
          suffixAgo: "",
          suffixFromNow: "",
          seconds: "menos de un minuto",
          minute: "un minuto",
          minutes: "unos %d minutos",
          hour: "una hora",
          hours: "%d horas",
          day: "un día",
          days: "%d días",
          month: "un mes",
          months: "%d meses",
          year: "un año",
          years: "%d años",
          wordSeparator: " ",
          numbers: []
        }
      },
      doTimeout: function() {
        ref.nowTime = (new Date()).getTime();
        $timeout(ref.doTimeout, ref.settings.refreshMillis);
      },
      init: function() {
        if (this.initted == false) {
          this.initted = true;
          this.nowTime = (new Date()).getTime();
          ref = this;
          this.doTimeout();
          this.initted = true;
        }
      },
      inWords: function(distanceMillis) {
        var $l = this.settings.strings;
        var prefix = $l.prefixAgo;
        var suffix = $l.suffixAgo;
        if (this.settings.allowFuture) {
          if (distanceMillis < 0) {
            prefix = $l.prefixFromNow;
            suffix = $l.suffixFromNow;
          }
        }

        var seconds = Math.abs(distanceMillis) / 1000;
        var minutes = seconds / 60;
        var hours = minutes / 60;
        var days = hours / 24;
        var years = days / 365;

        function substitute(stringOrFunction, number) {
          var string = $.isFunction(stringOrFunction) ? stringOrFunction(number, distanceMillis) : stringOrFunction;
          var value = ($l.numbers && $l.numbers[number]) || number;
          return string.replace(/%d/i, value);
        }

        var words = seconds < 45 && substitute($l.seconds, Math.round(seconds)) ||
        seconds < 90 && substitute($l.minute, 1) ||
        minutes < 45 && substitute($l.minutes, Math.round(minutes)) ||
        minutes < 90 && substitute($l.hour, 1) ||
        hours < 24 && substitute($l.hours, Math.round(hours)) ||
        hours < 42 && substitute($l.day, 1) ||
        days < 30 && substitute($l.days, Math.round(days)) ||
        days < 45 && substitute($l.month, 1) ||
        days < 365 && substitute($l.months, Math.round(days / 30)) ||
        years < 1.5 && substitute($l.year, 1) ||
        substitute($l.years, Math.round(years));

        var separator = $l.wordSeparator === undefined ?  " " : $l.wordSeparator;
        return $.trim([prefix, words, suffix].join(separator));
      }
    }
  }]);
});	


/*actualLogin: function() {


        _scope.news = [
        {
          id: 1, 
          when: 1342870861366, 
          type: "general", 
          subject: "Bienvenido/a a la nueva plataforma", 
          body: "Ya está en funcionamiento la nueva plataforma", 
          organizations: [], 
          profileGroups: []
        },
        {
          id: 10, 
          when: 1342868961366, 
          type: "profile", 
          subject: "Aviso a los docentes", 
          body: "Se recuerda a los docentes que ya está en funcionamiento la nueva plataforma", 
          organizations: [1], 
          profileGroups: [2, 3, 4]
        },

        {
          id: 15, 
          when: 1342770961366, 
          type: "users", 
          subject: "Comienzo de obras", 
          body: "Ya han comenzado las obras del plan Ola en el I.E.S. Oretania", 
          organizations: [1], 
          profileGroups: []
        },				
        ];

        _scope.events = {
          3: {
            id: 3, 
            start:44, 
            duration: 1, 
            done: false, 
            displayName: "Revisión de las programaciones"
          },
          7: {
            id: 7, 
            start:46, 
            duration: 2, 
            done: true, 
            displayName: "Asistencia del profesorado a la Sesión de Evaluación"
          },
          17: {
            id: 17, 
            start:47, 
            duration: 1, 
            done: false, 
            displayName: "Introducción de calificaciones en Séneca"
          },
          27: {
            id: 27, 
            start:47, 
            duration: 1, 
            done: false, 
            displayName: "Revisión de cuadernos de profesorado cumplimentados"
          },
          53: {
            id: 53, 
            start:2, 
            duration: 3, 
            done: true, 
            displayName: "Revisión de actas de calibración e informe a la Dirección", 
            description: "Revisión de las actas-informes de los departamentos e informar a la dirección del resultado de los mismos emitiendo un informe del curso. MD760103."
          },
          54: {
            id: 54, 
            start:3, 
            duration: 3, 
            done: false, 
            displayName: "Revisión de actas de calibración", 
            description: "Introducir calificaciones en Séneca antes del día de la primera sesión de evaluación."
          },
          60: {
            id: 60, 
            start:6, 
            duration: 2, 
            done: false, 
            displayName: "Elaborar la propuesta de Oferta Educativa", 
            description: "Elaborar la propuesta de Oferta Educativa para el curso siguiente."
          }
        };

        _scope.user = {
          id: 5,
          userName: 'lloplop269',
          displayName: 'Luis Ramón López López',
          email: 'lrlopez@iesoretania.es',
          emailNotifications: true,
          gender: 0,
          notifications: [
          {
            id: 23, 
            type: "info", 
            description: "José Luis Maroto ha entregado un documento para su revisión"
          },

          {
            id: 54, 
            type: "warning", 
            description: "Faltan 3 días para la fecha límite de un documento"
          }
          ],
          profiles: {
            1: [11, 22],
            2: [56, 57]
          },
          currentProfileId: 22,
          organizations: [1, 2],
          isLocalAdmin: true,
          isGlobalAdmin: false,
          lastLogin: 1342870961366
        };
      },*/
