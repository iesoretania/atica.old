'use strict';

/* Filters */

angular.module('aticaApp.filters', []).
  filter('interpolate', ['version', function(version) {
    return function(text) {
      return String(text).replace(/\%VERSION\%/mg, version);
    }
  }]).
  filter('test', function() {
  		return function(item) {
  			return _.filter(item, function(num){ return num % 2 == 1; });//[98];//  			return (item.id % 2)==0;
  		}
  	}
  ).
  filter('weekfilter', function() {
      return function(items, ids, hidedone, calstart, calViewDuration, calfirst, setfilteredcount) {
        items = _.filter(items, function(ev) {
          var normeventstart = (ev.start-calfirst+48) % 48;
          var normcalstart = (calstart-calfirst+48) % 48;
          var ok = (normeventstart < normcalstart+calViewDuration) &&
                   ((normeventstart+ev.duration) > normcalstart);
          //ok = true;
          if (ids.length>0) {
            ok = ok && (_.indexOf(ids, ev.id)!=-1); 
          }
          if (hidedone) {
            ok = ok && (ev.done == false); 
          }
          return ok; 
        });
        setfilteredcount(items.length);
        return items;
      }
  }).
  filter('fillrow', function() {
    return function(elem, startweek, duration) {
      var result = [];
      var remaining = duration;
      var start = startweek;
      //if (log) console.log("startweek: "+startweek+", duration: "+duration);
      if (duration<0) {
        return [];
      }
      var group = Math.min(4-(start % 4), remaining);
      if (group<4) {
        if (group>0) {
          result[result.length] = group;
        }
        //if (log) console.log("    residual: "+group);
        start += (start % 4);
        remaining -= group;
      }
      var seguro = 30;
      while (remaining>0 && seguro>0) {
        group = Math.min(remaining, 4);
        if (group>0) {
          result[result.length] = group;
        }
        remaining -= group;
        //if (log) console.log("    group: "+group+", remaining: "+remaining);
        seguro--;
      }
      //if (log) console.log(result);
      return result;
  }
});
