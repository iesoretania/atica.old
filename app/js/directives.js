'use strict';

/* Directives */


angular.module('aticaApp.directives', []).
  directive('appVersion', ['version', function(version) {
    return function(scope, elm, attrs) {
      elm.text(version);
    };
  }]).
  directive('bsPopover', function(){
    return function(scope, linkElement, attrs) {
      linkElement.popover();
    };
  }).
  directive('timeAgo', ['timeAgoService', function(timeago) {
    return {
      //replace: true,
      //priority: 0,
      scope: {
        "fromTime":"@"
      },
      link: {
        post: function(scope, linkElement, attrs) {
          scope.timeago = timeago;
          scope.timeago.init();
          scope.$watch("timeago.nowTime-fromTime",function(value) {
            if (scope.timeago.nowTime != undefined) {
              value = scope.timeago.nowTime-scope.fromTime;
              $(linkElement).text(scope.timeago.inWords(value));
            }
          //console.log("timeAgo: "+scope.timeago.nowTime+"-"+scope.fromTime+"="+value);
          });
        }
      }
    }
  }]).
  directive('animateOnChange', function(){
    return {
      link: function(scope, linkElement, attrs) {
        // Skip first animation
        var first = true;
        attrs.$observe('animateOnChange', function (value) {
          if (first == false) {
            $(linkElement).hide().slideDown(500);
          }
          first = false;
        });
      }
    }
  }).
  directive('weekNames', function(){
    return {
      replace: true,
      priority: 0,
      scope: {
        "weekStart":"@",
        "weekCount":"@"
      },
      link: {
        post: function(scope, linkElement, attrs) {
          scope.$watch("weekStart*48+weekCount",function(value) {
            var i;
            var last = parseInt(attrs.weekStart)+parseInt(attrs.weekCount);
            var months=["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
            var weeks =["1ª", "2ª", "3ª", "4ª"];
            var result = "";
            for (i=parseInt(attrs.weekStart);i<last;i++) {
              result += "<th class=\"" + (((i%4)==0) ? "monthstart " : "")
              + (((Math.floor(i/4)%2)==0) ? "evenmonth" : "oddmonth")+ "\">"
              + months[(Math.floor(i/4)+12) % 12] + "<br />" + weeks[(i+48) % 4] + "</th>";
            }
            $(linkElement).html(result);
          });
        }
      }
    }
  });
