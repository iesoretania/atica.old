'use strict';

/* Controllers */

function MainViewCtrl($scope, $route, $routeParams, $location, user) {

  //user.setOrganization(1);
  $scope.d = user.getScope();
  /*$scope.user = user.getUser();
  $scope.activities = user.getActivities();
  $scope.events = user.getEvents();
  $scope.documents = user.getDocuments();
  $scope.profiles = user.getProfiles();
  $scope.profileGroups = user.getProfileGroups();
  $scope.organizations = user.getOrganizations();*/
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

    //console.log("$"+mylocation.path().substring(0,matchlength)+"$=$"+partialpath+"$");
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
//$('.dont-click').click(function(e) { e.stopPropagation(); });
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
    function() {
      $('input.loginbutton').button('reset');
      $scope.frm.password = "";
      $scope.frm.error = "Nombre de usuario o contraseña incorrecto";
    });
  }

  /*$scope.$watch('d.user.userName', function(v) {
    //if (v != undefined) {
    $scope.setLocation('#/selectprofile');
  //}
  });/*/

  $('.dropdown-menu input').click(function(e) {
    //e.stopPropagation();
  });

  $('input.loginbutton').click(function () {
    $(this).button('loading');
  });  

}
LoginFormViewCtrl.$inject = ['$scope', '$location', 'userDataService'];

function CalendarViewCtrl($scope, $location) {
  /*if (!$scope.d.user) {
    $location.path("/home");
  };*/

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


function HomeViewCtrl($scope, $routeParams, user) {
//$('.dropdown-menu input').click(function(e) { e.stopPropagation(); });
  if (angular.isDefined($routeParams.organization_id) && angular.isDefined($scope.d.organization) && ($routeParams.organization_id != $scope.d.organization)) {
    //console.log("!!Cambiando organización!!");
    //console.dir($scope.d.organization);
    user.setOrganization($routeParams.organization_id);
    //console.dir($scope.d.organization);
    //console.log("!!Fin de cambio de organización!!");   
  }
}

HomeViewCtrl.$inject = ['$scope', '$routeParams', 'userDataService'];

function NewsViewCtrl($scope) {
}

function ProfileViewCtrl($scope, $location, user) {
  if (!$scope.d.user) {
    $location.path("/home");
    //console.dir($scope);
  }
  //$scope.d = $scope.$parent.d;
  
  $scope.$watch("d.snapshotId", function(value) {
    //console.log("Cambio de snapshot a "+value);
    if (value!=undefined) {
      $scope.d.profileId = $scope.d.user.profiles[value][0];
    }
    //console.log("Nuevo perfil es "+$scope.d.profileId);
    
  });
  
  $scope.downloadData = function() {
    
      user.loaddata($scope.d.snapshotId, function() {
        $location.path('/home');
      }, function() {
        $location.path('/error')
      });
    
  }
}
ProfileViewCtrl.$inject = ['$scope', '$location', 'userDataService'];

function ActivityViewCtrl($scope, $location) {
  /*if (!$scope.d.user) {
    $location.path("/home");
  }*/
}
ActivityViewCtrl.$inject = ['$scope', '$location'];


function SectionViewCtrl($scope, $location, $routeParams, user) {
  /*console.dir($scope.$routeParams);
  $scope.grouping = user.getGrouping($scope.$routeParams.section_id, function() {
    console.log("grouping unit ok!"); 
  },
  function() {
    console.log("grouping unit error!"); 
  });*/
  if (!$scope.d.organization) {
    $location.path("/home");
    //console.dir($scope);
  }
  //console.log($routeParams);
  $scope.$routeParams = $routeParams;
}
SectionViewCtrl.$inject = ['$scope', '$location', '$routeParams', 'userDataService'];

function ErrorViewCtrl($scope) {
}
ErrorViewCtrl.$inject = ['$scope'];

function FolderViewCtrl($scope, user) {
  //console.dir($scope);
  $scope.loading = true;
  user.getfolder($scope.$parent.folderId, ($scope.d.loaded!=true), function(e) {
    $scope.loading = false;
    $scope.deliveries = e.deliveries;
    $scope.deliveriesOrder = e.deliveriesOrder;
  }, function () {
    $scope.error = true;
    $scope.loading = false;
  });
}
FolderViewCtrl.$inject = ['$scope', 'userDataService'];