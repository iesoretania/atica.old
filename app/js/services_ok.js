'use strict';

/* Services */


// Demonstrate how to register services
// In this case it is a simple value service.
angular.module('aticaApp.services', [], function ($provide) {
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
			  console.log("Launched! "+ref.settings.refreshMillis);
			  $timeout(ref.doTimeout, ref.settings.refreshMillis);
			},
			init: function() {
				if (this.initted == false) {
					this.initted = true;
					this.nowTime = (new Date()).getTime();
					console.log("Launching...");
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
