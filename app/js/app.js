'use strict';


// Declare app level module which depends on filters, and services
angular.module('aticaApp', ['ngSanitize', 'aticaApp.filters', 'aticaApp.services', 'aticaApp.directives', 'popup']).
  config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/activity/:activityId', {templateUrl: 'partials/activity.html', controller: ActivityViewCtrl});
    $routeProvider.when('/home', {templateUrl: 'partials/home.html', controller: HomeViewCtrl});
    $routeProvider.when('/home/:organization_id', {templateUrl: 'partials/home.html', controller: HomeViewCtrl});
    $routeProvider.when('/browser', {templateUrl: 'partials/browser.html', controller: BrowserViewCtrl});
    $routeProvider.when('/browser/:categoryId', {templateUrl: 'partials/browser.html', controller: BrowserViewCtrl});
    $routeProvider.when('/calendar', {templateUrl: 'partials/calendar.html', controller: CalendarViewCtrl});
    $routeProvider.when('/calendar/:event_id', {templateUrl: 'partials/calendaritem.html', controller: CalendarItemViewCtrl});
    $routeProvider.when('/error', {templateUrl: 'partials/error.html', controller: ErrorViewCtrl});
    $routeProvider.when('/news', {templateUrl: 'partials/news.html', controller: NewsViewCtrl});
    $routeProvider.when('/selectprofile', {templateUrl: 'partials/selectprofile.html', controller: ProfileViewCtrl});
    $routeProvider.when('/section/:section_id', {templateUrl: 'partials/section.html', controller: SectionViewCtrl});
    $routeProvider.when('/upload/:folderId/:categoryId/:groupingId/:eventId', {templateUrl: 'partials/upload.html', controller: UploadViewCtrl});
    $routeProvider.otherwise({redirectTo: '/home'});
  }]);
