'use strict';

/* Services */

angular.module('aticaApp.services', ['ngResource'], function ($provide) {
  $provide.service('userDataService', ['$resource', '$timeout', function($resource, $timeout) {
    var _scope = {};

    _scope.user = false;

    _scope.organizations = {
      1: {
        displayName: 'I.E.S. Oretania'
      },
      2: {
        displayName: 'I.E.S. Ntra. Sra. de la Cabeza'
      }
    };

    _scope.documents = {
      8:  {
        organizationId: 1, 
        displayName: "Plan de centro"
      },
      34: {
        organizationId: 1, 
        displayName: "Criterios de correción"
      },
      91: {
        organizationId: 1, 
        displayName: "Banco de actividades"
      }
    };

    _scope.guestdocuments = [8, 34, 91];
		
    return {
      getScope: function() {
        return _scope;
      },
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
      actualLogin: function() {

        _scope.activities = {
          23: {
            organizationId: 1, 
            displayName: "Evaluaciones trimestrales", 
            description: "Documentos y registros que hay que usar en las revisiones trimestrales", 
            folders: [120]
          },
          98: {
            organizationId: 1, 
            displayName: "Final de curso"
          },
          67: {
            organizationId: 1, 
            displayName: "F.C.T."
          },
          54: {
            organizationId: 1, 
            displayName: "Revisión del S.G.C."
          }
        };
                                
        _scope.folders = {
          120:{
            id: 120, 
            categoryId: 20, 
            displayName: "Modelos de programación", 
            description: "Aquí se encuentran los modelos de documentos usados en el subproceso de Programación"
          }
        }
                                
        _scope.deliveries = {
          120: {
            55: {
              id: 55,
              profilegroupId: 1,
              displayName: "MD750101PG_Modelo_de_programación_didáctica",
              linkDeliveryId: null,
              creationDate: 1323870961366,
              uploaderPersonId: 5
            },
            65: {
              id: 65,
              profilegroupId: 1,
              displayName: "MD750102PG_Modelo_de_revisión_de_programación_didáctica",
              linkDeliveryId: null,
              creationDate: 1323970961366,
              uploaderPersonId: 5
            }  
          }
        }
        
        _scope.users = {
          5: {
             displayName: "Luis Ramón López López"
          }
        }

        _scope.profileGroups = {
          1: {
            id: 1, 
            organizationId: 1, 
            displayName: ["Coordinador", "Coordinadora", "Coordinador/a", "C"], 
            activities: [54, 98], 
            events: [3], 
            documents: [8]
          },
          2: {
            id: 2, 
            organizationId: 1, 
            displayName: ["Jefe de estudios", "Jefa de estudios", "Jefe/a de estudios", "JE"], 
            activities: [23, 98], 
            events: [7, 60], 
            documents: [8, 34, 91], 
            subprofileGroups: [23, 24]
          },	
          3: {
            id: 3, 
            organizationId: 1, 
            displayName: ["Profesor", "Profesora", "Profesor/a", "P"], 
            activities: [23, 98, 67], 
            events: [3, 7, 17, 27, 53, 54, 60], 
            documents: [8, 34, 91]
          },	
          4: {
            id: 4, 
            organizationId: 1, 
            displayName: ["Director", "Directora", "Director/a", "D"], 
            activities: [98], 
            events: [17, 27], 
            documents: [8, 34]
          },
          5: {
            id: 5, 
            organizationId: 1, 
            displayName: ["Jefe de departamento", "Jefa de departamento", "Jefe/a de departamento", "JD"], 
            activities: [98], 
            events: [17, 27], 
            documents: [8, 91], 
            subprofileGroups: [56, 57]
          }
        };

        _scope.profiles = {
          11: {
            id: 11, 
            groupId: 3, 
            displayName: ""
          },
          22: {
            id: 22, 
            groupId: 1, 
            displayName: ""
          },
          23: {
            id: 23, 
            groupId: 2, 
            displayName: "Diurno"
          },
          24: {
            id: 24, 
            groupId: 2, 
            displayName: "Adjunto"
          },
          56: {
            id: 56, 
            groupId: 5, 
            displayName: "Lengua"
          },
          57: {
            id: 57, 
            groupId: 5, 
            displayName: "Matemáticas"
          }
        }

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
        };//*/

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
        console.log("Activado!");
        $('input.loginbutton').button('reset');
      },
      login: function() {
        console.log("Activando en 3 segundos...");
        $timeout(this.actualLogin, 3000);
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
        //console.log("Launched! "+ref.settings.refreshMillis);
        $timeout(ref.doTimeout, ref.settings.refreshMillis);
      },
      init: function() {
        if (this.initted == false) {
          this.initted = true;
          this.nowTime = (new Date()).getTime();
          //console.log("Launching...");
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
