'use strict';


// Declare app level module which depends on filters, and services
angular.module('aticaApp', ['aticaApp.filters', 'aticaApp.services', 'aticaApp.directives']).
  config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/home', {templateUrl: 'partials/home.html', controller: HomeViewCtrl});
    $routeProvider.when('/home/:organization_id', {templateUrl: 'partials/home.html', controller: HomeViewCtrl});
    $routeProvider.when('/error', {templateUrl: 'partials/error.html', controller: ErrorViewCtrl});
    $routeProvider.when('/activity/:activityId', {templateUrl: 'partials/activity.html', controller: ActivityViewCtrl});
    $routeProvider.when('/calendar', {templateUrl: 'partials/calendar.html', controller: CalendarViewCtrl});
    $routeProvider.when('/calendar/:event_id', {templateUrl: 'partials/calendaritem.html', controller: CalendarItemViewCtrl});
    $routeProvider.when('/selectprofile', {templateUrl: 'partials/selectprofile.html', controller: ProfileViewCtrl});
    $routeProvider.when('/news', {templateUrl: 'partials/news.html', controller: NewsViewCtrl});
    $routeProvider.when('/section/:section_id', {templateUrl: 'partials/section.html', controller: SectionViewCtrl});
    //$routeProvider.when('/calendar/list', {templateUrl: 'partials/calendarlist.html', controller: CalendarListViewCtrl});
    //$routeProvider.when('/view2', {templateUrl: 'partials/partial2.html', controller: MyCtrl2});
    $routeProvider.otherwise({redirectTo: '/home'});
  }]);
