'use strict';

/* Controllers */

function MainViewCtrl($scope, $route, $routeParams, $location, user) {

  $scope.d = user.getScope();
  $scope.calFirstWeek = 34; // Second week (2) of september (32)

  $scope.normalizeWeek = function (week) {
    return (week-$scope.calFirstWeek+48) % 48;
  }

  $scope.countPastNotDoneEvents = function() {
    return _.reduce(user.getEvents(), function(total, ev) {
      total += (ev.done==false && ($scope.normalizeWeek(ev.start+ev.duration))< ($scope.normalizeWeek($scope.currentWeek))) ? 1 : 0;
      return total;
    },0);
  };

  $scope.countNotDoneEvents = function() {
    return _.reduce(user.getEvents(), function(total, ev) {
      total += (ev.done==false && ($scope.normalizeWeek(ev.start+ev.duration))>=($scope.normalizeWeek($scope.currentWeek))) ? 1 : 0;
      return total;
    },0);
  };

  var mydate = new Date();
  $scope.currentWeek = mydate.getMonth()*4 + Math.floor((mydate.getDate()>27) ? 4 : mydate.getDate()/7);

  $scope.$route = $route;
  $scope.$location = $location;
  $scope.$routeParams = $routeParams;

  $scope.isActive = function(mylocation, partialpath) {
    var matchlength = partialpath.length;
    var matched = mylocation.path().substring(0,matchlength)==partialpath;

    // Check for trailing slash, which means partial match
    if (matched && (mylocation.path().length>matchlength)) {
      matched = mylocation.path()[matchlength]=='/';
    }

    return {
      active: matched
    };
  }

  $scope.setLocation = function(loc) {
    $location.path(loc);
  }

  $scope.getSize = function(a) {
    return _.size(a);
  }

  $scope.logout = function() {
    user.logout();
  }

}

MainViewCtrl.$inject = ['$rootScope', '$route', '$routeParams', '$location', 'userDataService'];

function LoginFormViewCtrl($scope, $location, user) {
  $scope.login = function(username, pass,  snap) {
    $scope.frm.error = undefined;
    user.login(username, pass, snap, function() {
      $('input.loginbutton').button('reset');
      $scope.frm.username = "";
      $scope.frm.password = "";
      $location.path("/selectprofile");
    },
    function(e) {
      $('input.loginbutton').button('reset');
      $scope.frm.password = "";
      switch(e.status) {
        case 404:
          $scope.frm.error = "Nombre de usuario o contraseña incorrecto";
          break;
        case 403:
          $scope.frm.error = "El usuario ha sido bloqueado. Inténtelo de nuevo pasados 10 minutos";
          break;
        default:
          $scope.frm.error = "No se ha podido contactar con el servidor"
      } 
    });
  }

  $('input.loginbutton').click(function () {
    $(this).button('loading');
  });  

}
LoginFormViewCtrl.$inject = ['$scope', '$location', 'userDataService'];

function CalendarViewCtrl($scope, $location) {

  $("div.popover").remove();
	
  $scope.calViewDuration = 8;

  $scope.$watch('calViewDuration', function(value) {
    var over = $scope.normalizeWeek($scope.calViewStart)+$scope.calViewDuration - 48;
    if (over>0) {
      $scope.calViewStart -= over;
    }
  });

  $scope.calViewStart = (48 + $scope.currentWeek - $scope.calViewDuration/2) % 48;
  $scope.filterbyids = [];
  $scope.ownprofile = "";
  $scope.otherprofile = "";
  $scope.hidedone = false;
  $scope.filteredEvents = 0;

  $scope.weekNames = function( from, duration) {
    var i;
    var months=["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
    var weeks =["1ª", "2ª", "3ª", "4ª"];
    var result = "";
    for (i=from;i<from+duration;i++) {
      result += "<th class=\"" + (((i%4)==0) ? "monthstart " : "")
      + (((Math.floor(i/4)%2)==0) ? "evenmonth" : "oddmonth")+ "\">"
      + months[Math.floor(i/4) % 12] + "<br />" + weeks[i % 4] + "</th>";
    }
    return result;
  };

  $scope.prevWeek = function() {
    if ($scope.calViewStart != $scope.calFirstWeek) {
      $scope.calViewStart = ($scope.calViewStart-1+48) % 48;
    }
  }
    
  $scope.prevMonth = function() {
    var start = $scope.calViewStart;
    var first = $scope.calFirstWeek;

    var i;
    for (i=0;i<4;i++) {
      if (start != first) {
        start = (start-1+48) % 48;
      }
    }
    $scope.calViewStart = start;
  }

  $scope.nextWeek = function() {
    if ((($scope.calViewStart+$scope.calViewDuration) % 48) !=$scope.calFirstWeek) {
      $scope.calViewStart = ($scope.calViewStart+1) % 48;
    }
  }
    
  $scope.nextMonth = function() {
    var start = $scope.calViewStart;
    var first = $scope.calFirstWeek;

    var i;
    for (i=0;i<4;i++) {
      if ((start+$scope.calViewDuration) != first) {
        start = (start+1) % 48;
      }
    }
    $scope.calViewStart = start;
  }

  $scope.showNext = function() {
    return (($scope.calViewStart+$scope.calViewDuration) % 48) != $scope.calFirstWeek;
  }

  $scope.showPrevious = function() {
    return $scope.normalizeWeek($scope.calViewStart)>0;
  }

  $scope.getEventSkippedWeeks = function(event) {
    return $scope.normalizeWeek(event.start)-$scope.normalizeWeek($scope.calViewStart);
  }

  $scope.getEventWeeks = function(event) {
    return event.duration + Math.min(0,$scope.getEventSkippedWeeks(event))+
    Math.min(0,$scope.normalizeWeek($scope.calViewStart)+$scope.calViewDuration-$scope.normalizeWeek(event.start)-event.duration);
  //return $scope.calViewDuration - Math.min($scope.getEventSkippedWeeks(event),0) - $scope.getEventFilledWeeks(event);
  }

  $scope.getEventFilledWeeks = function(event) {
    return Math.max($scope.calViewDuration-($scope.normalizeWeek(event.start)-$scope.normalizeWeek($scope.calViewStart)+event.duration), 0);
  }    

  $scope.getEventOverflow = function(event) {
    return -Math.min(0,$scope.normalizeWeek($scope.calViewStart)+$scope.calViewDuration-$scope.normalizeWeek(event.start)-event.duration);
  }

  $scope.getEventClasses = function(event) {
    var result = {
      done: event.done
    };
    result.past = ($scope.normalizeWeek(event.start)+event.duration)< $scope.normalizeWeek($scope.currentWeek);
    result.future = $scope.normalizeWeek(event.start) > $scope.normalizeWeek($scope.currentWeek);
    result.now = (result.past == result.future);
    result.pastdone = (result.past && result.done);
    return result; 
  }

  $scope.getOtherProfileGroups = function (value) {
    if (value == undefined) return;
    if ($scope.d.profiles == undefined) return;
    var group = _.flatten(value);
    group = _.map(group, function(e) {
      return $scope.d.profiles[e].profileGroupId;
    });
    return _.difference(_.pluck($scope.d.profileGroups, 'id'), group);
  }

  $scope.getProfileGroups = function (value) {
    if (value == undefined) return;
    if ($scope.d.profiles == undefined) return;
    var group = _.flatten(value);
    group = _.map(group, function(e) {
      return $scope.d.profiles[e].profileGroupId;
    });
    group = _.uniq(group);
    return group;
  }

  $scope.setFilteredCount = function (value) {
    $scope.filteredEvents = value;
  }
  //$("a.autopop").first().text($scope.);
  $("popover").popover("hide");
}
CalendarViewCtrl.$inject = ["$scope","$location"];

function CalendarItemViewCtrl($scope, $location) {
  /*if (!$scope.d.user) {
    $location.path("/home");
  };*/
  $("div.popover").remove();
}
CalendarItemViewCtrl.$inject = ['$scope', "$location"];


function HomeViewCtrl($scope, $routeParams, $location, user) {
  if (angular.isDefined($routeParams.organization_id) && angular.isDefined($scope.d.organization) && ($routeParams.organization_id != $scope.d.organization)) {
    user.setOrganization($routeParams.organization_id);
  }
  if ($scope.d.user && !$scope.d.loaded) {
    $location.path("/selectprofile");
    return;
  }
}

HomeViewCtrl.$inject = ['$scope', '$routeParams', "$location", 'userDataService'];

function NewsViewCtrl($scope) {
}

NewsViewCtrl.$inject = ['$scope'];

function ProfileViewCtrl($scope, $location, user) {
  if (!$scope.d.user) {
    $location.path("/home");
    return;
  }
  $('#start').on('click', function () {
    $(this).button('loading');
  });
  
  $scope.$watch("d.snapshotId", function(value) {
    if (value !== undefined) {
      $scope.d.profileId = $scope.d.user.profiles[value][0];
    }
  });
  
  $scope.downloadData = function(e) {
    
    user.loaddata($scope.d.snapshotId, function() {
      $(e).button('reset');
      $location.path('/home');
    }, function() {
      $(e).button('reset');
      $location.path('/error')
    });
    
  }
}
ProfileViewCtrl.$inject = ['$scope', '$location', 'userDataService'];

function ActivityViewCtrl($scope, $location) {
  if (!$scope.d.user) {
    $location.path("/home");
    return;
  }
}
ActivityViewCtrl.$inject = ['$scope', '$location'];


function SectionViewCtrl($scope, $location, $routeParams, user) {
  if (!$scope.d.organization) {
    $location.path("/home");
    return;
  }
  $scope.$routeParams = $routeParams;
}
SectionViewCtrl.$inject = ['$scope', '$location', '$routeParams', 'userDataService'];

function ErrorViewCtrl($scope) {
}
ErrorViewCtrl.$inject = ['$scope'];

function FolderViewCtrl($scope, user, PopupService) {
  

  $scope.loading = true;
  $scope.folder = $scope.d.folders[$scope.folderId];
      
  $scope.uploadFilter = -2;
  $scope.profileFilter = -2;
  
  $scope.ownProfilesOrder = [];
  $scope.uploaders = [];
  $scope.profilesFilterOrder = [];
  
  $scope.totalCount = {};
  $scope.total = 0;
  
  $scope.folderEditEnabled = ($scope.d.isAdmin==true) || (_.intersect($scope.folder.managers, $scope.d.user.profileGroups).length>0);
  $scope.folderUploadEnabled = $scope.folderEditEnabled || ($scope.d.isAdmin==true) || (_.intersect($scope.folder.uploaders, $scope.d.user.profileGroups).length>0);
  
  $scope.$watch('profileFilter', function(e) {
    if (e === undefined) return;
    updateProfileSelect(e);
  });
  
  $scope.$watch('uploadFilter', function(e) {
    
    });
  
  $scope.$watch('totalCount', function(e) {
    $scope.total = _.reduce($scope.totalCount, function(sum, e) {
      return sum+e
    }, 0);
  //console.log($scope.total);
  }, true);
  
  function updateProfileSelect(e) {
  
    if ($scope.loading == true) return;
    
    if (e === -2) {
      if ($scope.folder.isDivided == false || $scope.d.loaded !== true) {
        return [-2];
      }
      else {
        $scope.profilesCurrentOrder = $scope.profilesOrder;
      }
    }
    else {
      if (e === -1) {
        $scope.profilesCurrentOrder = $scope.ownProfilesOrder;
      }
      else {
        $scope.profilesCurrentOrder = [$scope.profileFilter];
      }
    }
    $scope.uploaders = [];
    angular.forEach($scope.profilesCurrentOrder, function(prof) {
      angular.forEach($scope.deliveriesOrder[prof], function(e) {
        var value = $scope.getUploader(e);
        if (_.indexOf($scope.uploaders, value) == -1) {
          $scope.uploaders.push(value);
        }
      });
    });
    
    $scope.uploaders = _.sortBy($scope.uploaders, function (e) {
        
      if (e == $scope.d.user.id) return "";
        
      return $scope.d.persons[e].displayName || ("Persona "+e);
    });
    
    // put "All uploaders" option at the top
    $scope.uploaders.unshift(-2);
    if (_.indexOf($scope.uploaders, $scope.uploadFilter) == -1) {
      // if previous uploader filter is no longer applicable,
      // reset to "all uploaders"
      $scope.uploadFilter = -2;
    }
    $scope.profilesFilterOrder = _.clone($scope.profilesOrder);
    if ($scope.ownProfilesOrder.length>0) {
      $scope.profilesFilterOrder.unshift(-1);
    }
    $scope.profilesFilterOrder.unshift(-2);  
    $scope.totalCount = {};
  }
  
  $scope.cancel = function() {
    PopupService.close();
  }
  
  $scope.getDownloadLink = function(id, id2) {
    return user.getdownloaddeliveryurl(id, id2);
  }
  
  $scope.group = function(p) {
    if ($scope.deliveriesOrder == undefined) return p;
    var folder = $scope.d.folders[$scope.$parent.folderId];
    //console.log($scope.$parent.folderId);
    if (($scope.d.loaded != true) || (folder.isDivided == false)) {
      return [-2];
    }
    if ($scope.profileFilter == -2) {
      return p;
    }
    if ($scope.profileFilter == -1) {
      return _.intersection(p, $scope.d.user.profiles[$scope.d.snapshotId]);
    }
    return [$scope.profileFilter];
  }
  
  $scope.getUploader = function(deliveryId) {
    return $scope.deliveries[deliveryId].revisions[$scope.deliveries[deliveryId].currentRevisionId].uploaderPersonId;
  }
  
  $scope.filterDelivery = function(p,pid) {
    if (p === undefined) return p;
    
    if ($scope.uploadFilter == -2) {
      $scope.$parent.deliveriesCount = p.length;
      $scope.totalCount[pid] = p.length;
      return p;
    }
    var out = [];
    angular.forEach(p, function(e) {
      if ($scope.getUploader(e) == $scope.uploadFilter) {
        out.push(e);
      }
    });
    $scope.$parent.deliveriesCount = out.length;
    $scope.totalCount[pid] = out.length;
    return out;
  }
  
  $scope.toUpperCase = function(str) {
    if (str === undefined) return "";
    return str.toUpperCase();
  }
  
  $scope.showName = function(key) {
    if (key === undefined) return "";
    if (key == -2) return "Todos los envíos";
    if (key == $scope.d.user.id) return "Sólo los míos";
    return $scope.d.persons[key].displayName;
  }
  
  $scope.showProfile = function(key) {
    if (key === undefined) return "";
    if (key == -2) return "Todos los perfiles";
    if (key == -1) return "Mis perfiles";
    if ($scope.d.profiles[key] === undefined) return "Error "+key;
    return $scope.d.profileGroups[$scope.d.profiles[key].profileGroupId].displayName[2]+" "+$scope.d.profiles[key].displayName;
  }

    
  user.getfolder($scope.$parent.folderId, ($scope.d.loaded!=true), function(e) {
    $scope.loading = false;
    $scope.deliveries = e.deliveries;
    $scope.deliveriesOrder = e.deliveriesOrder;
    $scope.deliveriesOrder[-2] = _.flatten($scope.deliveriesOrder);
    $scope.profilesOrder = _.filter(e.profilesOrder, function(p) {
      return e !== null
    });
    $scope.ownProfilesOrder = [];
   
    $scope.profilesCurrentOrder = [-2];
    
    if ($scope.d.loaded == true) {
      $scope.ownProfilesOrder = _.intersection(e.profilesOrder, $scope.d.user.profiles[$scope.d.snapshotId]);
      if ($scope.folder.isDivided == true) {
        $scope.profilesCurrentOrder = $scope.profilesOrder;
      }
            
    }
    updateProfileSelect(-2);
  }, function () {
    $scope.error = true;
    $scope.loading = false;
  });
}
FolderViewCtrl.$inject = ['$scope', 'userDataService', 'PopupService'];

function FolderProfileGroupViewCtrl($scope) {
  $scope.genderShown = -1;
}

FolderProfileGroupViewCtrl.$inject = ['$scope'];

function FolderDeliveryViewCtrl($scope, user, PopupService) {
  $scope.delivery = $scope.deliveries[$scope.deliveryId];
  $scope.revision = $scope.delivery.revisions[$scope.delivery.currentRevisionId];
  if ($scope.d.persons !== undefined) {
    $scope.uploader = $scope.d.persons[$scope.revision.uploaderPersonId];
    $scope.editEnabled = $scope.folderEditEnabled || ($scope.uploader.id==$scope.d.user.id);
    // Allow detecting gender of each profile
    if ($scope.$parent.$parent.genderShown == -1) {
      $scope.$parent.$parent.genderShown = $scope.uploader.gender;
    }
    else {
      if (($scope.$parent.$parent.genderShown != 2) && ($scope.$parent.$parent.genderShown != $scope.uploader.gender)) {
        $scope.$parent.$parent.genderShown = 2;
      }
    }
  }
  
}
FolderDeliveryViewCtrl.$inject = ['$scope', 'userDataService', 'PopupService'];

function BrowserViewCtrl($scope, $location, $routeParams, user) {
  if (!$scope.d.user) {
    $location.path("/home");
    return;
  }
  
  $scope.categoryId = $routeParams.categoryId;
  
  user.loadcategorytree(false, function() {
  
    }, function() {
   
    });
}

BrowserViewCtrl.$inject = ['$scope', '$location',  '$routeParams', 'userDataService'];

function UploadViewCtrl($scope, $location, $routeParams, user) {
  if (!$scope.d.user) {
    $location.path("/home");
    return;
  }
  
  $scope.folder = $scope.d.folders[$routeParams.folderId];
  
  $scope.folderEditEnabled = ($scope.d.isAdmin==true) || (_.intersect($scope.folder.managers, $scope.d.user.profileGroups).length>0);
  $scope.folderUploadEnabled = $scope.folderEditEnabled || ($scope.d.isAdmin==true) || (_.intersect($scope.folder.uploaders, $scope.d.user.profileGroups).length>0);

  if (!$scope.folderEditEnabled && !$scope.folderUploadEnabled) {
    $location.path("/home");
    return;
  }
  $scope.folderId = $routeParams.folderId;
  $scope.categoryId = $routeParams.categoryId;
  $scope.groupingId = $routeParams.groupingId;
  $scope.eventId = $routeParams.eventId;
  
  if ($scope.folderEditEnabled) {
    $scope.uploadProfileGroups = $scope.folder.uploaders;
    $scope.uploadProfiles = [];
    angular.forEach($scope.uploadProfileGroups, function(e) {
      //console.log("profileGroup: "+e);
      _.each($scope.d.profiles, function(p, key) {
        //console.log("   "+key+": profileGroupId="+p.profileGroupId);
        if (p.profileGroupId == e) {
          $scope.uploadProfiles.push(key);
        //console.log("         hit!");
        }
      })
    });
  }
  else {
    $scope.uploadProfileGroups = _.intersect($scope.folder.uploaders, $scope.d.user.profileGroups);
    $scope.uploadProfiles = _.filter($scope.d.user.profiles[$scope.d.snapshotId], function(e) {
      return _.include($scope.uploadProfileGroups, $scope.d.profiles[e].profileGroupId);
    });
  }
  
  $scope.getProfileName = function(e) {
    if (angular.isDefined($scope.d.profiles) == false) return "";
    return $scope.d.profileGroups[$scope.d.profiles[e].profileGroupId].displayName[$scope.d.user.gender] + " " + $scope.d.profiles[e].displayName;
  }
  
  if (_.include($scope.uploadProfiles, $scope.d.profileId)) {
    $scope.profileId = $scope.d.profileId;
  }
  else {
    $scope.profileId = $scope.uploadProfiles[0];
  }
  $scope.uploadProgress = 0;
  $scope.uploadStatus = {};
  $scope.uploadStatusData = {};
  $scope.uploadStatusProgress = {};
  $scope.uploadFiles = [];
  $scope.uploadDescriptions = {};
  $scope.ready = true;
  
  $scope.formatSize =  function (bytes) {
    if (typeof bytes !== 'number') {
      return '';
    }
    if (bytes >= 1000000000) {
      return (bytes / 1000000000).toFixed(2) + ' GB';
    }
    if (bytes >= 1000000) {
      return (bytes / 1000000).toFixed(2) + ' MB';
    }
    return (bytes / 1000).toFixed(2) + ' KB';
  }
  
  $scope.fileStatusIcon = function(s) {
    return ['icon-time', 'icon-upload','icon-ok-circle','icon-exclamation-sign'][$scope.uploadStatus[s]];
  }
  
  $scope.lastRequest = null;
  
  $('#fileupload').fileupload({
    dataType: 'json',
    
    sequentialUploads: true,
    
    add: function (e, data) {
      //console.log("ADD");
      //console.dir(data);
      
      data.context = $scope.uploadFiles.length;
      
      $scope.$apply(function() {
        $scope.uploadStatus[data.context] = 0;
        $scope.uploadStatusProgress[data.context] = 0;
        $scope.uploadFiles.push(data);
      });
    },
    send: function (e, data) {
      //console.log("SEND");
      //console.dir(data);
      $scope.lastRequest = data.jqXHR;
      
      $scope.uploadStatus[data.context] = 1;
      $scope.uploadStatusProgress[data.context] = 100;
    
    },
    done: function (e, data) {
      //console.log("DONE");
      //console.dir(data);
      $scope.$apply(function() {
        $scope.uploadStatus[data.context] = 2;
      });
      $scope.doUploadNext();
    },
    fail: function (e, data) {
      //console.log("FAIL");
      //console.dir(data);
      
      $scope.$apply(function() {
        $scope.uploadStatus[data.context] = 3;
      });
    },
    progress: function (e, data) {
      $scope.$apply(function() {
        $scope.uploadStatusData[data.context] = data;
        $scope.uploadStatusProgress[data.context] = parseInt(data.loaded / data.total * 100, 10);
      });
    },
    progressall: function (e, data) {
      $scope.$apply(function() {
        $scope.uploadProgress = parseInt(data.loaded / data.total * 100, 10);
      });
    },
    formData: function(f) {
      //console.log("FORMDATA");
      //console.dir(f);
      return [{
        'name': 'profileId', 
        'value': $scope.profileId
      }, 

      {
        'name': 'folderId', 
        'value': $scope.folderId
      },

      {
        'name': 'description', 
        'value': $scope.description
      }];
    }
  });
  $scope.prepareFilename = function(f) {
    var desc = $scope.uploadDescriptions[f.context];
        
    var d = /(.*)\.[^.]+$/.exec(f);
    if (d.length==2) {
      desc=d[1];
    }
    else {
      desc=f;
    }
  
    desc = desc.replace(/_/g, " ");
    return desc;
  }
  $scope.doUploadNext = function(e) {
    var found = false;
    angular.forEach($scope.uploadFiles, function(f) {
      if (!found && $scope.uploadStatus[f.context] == 0) {
        $scope.ready = false;
        $scope.description = $scope.uploadDescriptions[f.context];
        if (!angular.isDefined($scope.description) || $scope.description.length==0) {
          $scope.description = $scope.prepareFilename(f.files[0].name)
        }
        f.submit();
        found = true;
      }
    });
    if (found == false) {
      $scope.$apply(function() {
        $scope.lastRequest = null;
        $scope.ready = true;
      });
    }
    if (angular.isDefined(e)) {
      e.stopPropagation();
    }
  }
  $scope.cancelUpload = function() {
    if ($scope.lastRequest != null) {
      $scope.lastRequest.abort();
      $scope.lastRequest = null;
    }
  }
  $scope.removeFile = function(e) {
    var i;
    for (i=0;i<$scope.uploadFiles.length;i++) {
      if ($scope.uploadFiles[i].context == e) {
        $scope.uploadFiles.splice(i,1);
        return;
      }
    }
  }
}

UploadViewCtrl.$inject = ['$scope', '$location',  '$routeParams', 'userDataService'];
