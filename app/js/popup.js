var directivesModule = angular.module('popup.directives', []);
directivesModule.directive('ngPopup', function(PopupService){
    return {
        restrict: 'A',
        link: function postLink(scope, element, attrs) {
            var ngPopupUrl= attrs['ngPopupUrl'];
            // Could have custom or boostrap modal options here
            var popupOptions = {};
            element.bind( "click", function()
            {
                PopupService.load(ngPopupUrl, scope, popupOptions);
            });
        }
    };
});

directivesModule.directive('ngConfirm', function(PopupService) {
    return {
        restrict: 'E',
        link: function postLink(scope, element, attrs) {
            // Could have custom or boostrap modal options here
            var popupOptions = {};
            element.bind("click", function()
            {
                PopupService.confirm(attrs["title"], attrs["actionText"], 
                        attrs["actionButtonText"], attrs["actionFunction"], 
                        attrs["cancelButtonText"], attrs["cancelFunction"], 
                        scope, popupOptions);
            });
        }
    };
    
});

directivesModule.directive('ngAlert', function(PopupService) {
    return {
        restrict: 'E',
        link: function postLink(scope, element, attrs) {
            // Could have custom or boostrap modal options here
            var popupOptions = {};
            element.bind("click", function()
            {
                PopupService.alert(attrs["title"], attrs["text"], 
                        attrs["buttonText"], attrs["alertFunction"], 
                        scope, popupOptions);
            });
        }
    };
    
});

var servicesModule = angular.module('popup.service', []);
servicesModule.factory('PopupService', function ($http, $compile)
{
    // Got the idea for this from a post I found. Tried to not have to make this 
    // object but couldn't think of a way to get around this
    var popupService = {};

    // Get the popup
    popupService.getPopup = function(create)
    {
        if (!popupService.popupElement && create)
        { 
            popupService.popupElement = $( '<div class="modal hide"></div>' );
            popupService.popupElement.appendTo( 'BODY' );
        }

        return popupService.popupElement;
    }

    popupService.compileAndRunPopup = function (popup, scope, options) {
        $compile(popup)(scope);
        popup.modal(options);
    }

    // Is it ok to have the html here? should all this go in the directives? Is there another way
    // get the html out of here?
    popupService.alert = function(title, text, buttonText, alertFunction, scope, options) {
        text = (text) ? text : "Alert";
        buttonText = (buttonText) ? buttonText : "Ok";
        var alertHTML = "";
        if (title)
        {
            alertHTML += "<div class=\"modal-header\"><h1>"+title+"</h1></div>";
        }
        alertHTML += "<div class=\"modal-body\">"+text+"</div>"
                    + "<div class=\"modal-footer\">";
        if (alertFunction)
        {
            alertHTML += "<button class=\"btn\" ng-click=\""+alertFunction+"\">"+buttonText+"</button>";
        }
        else
        {
            alertHTML += "<button class=\"btn\">"+buttonText+"</button>";
        }
        alertHTML += "</div>";
        var popup = popupService.getPopup(true);
        popup.html(alertHTML);
        if (!alertFunction)
        {
            popup.find(".btn").click(function () {
                popupService.close();
            });
        }
        
        popupService.compileAndRunPopup(popup, scope, options);
    }

    // Is it ok to have the html here? should all this go in the directives? Is there another way
    // get the html out of here?
    popupService.confirm = function(title, actionText, actionButtonText, actionFunction, cancelButtonText, cancelFunction, scope, options) {
        actionText = (actionText) ? actionText : "Are you sure?";
        actionButtonText = (actionButtonText) ? actionButtonText : "Ok";
        cancelButtonText = (cancelButtonText) ? cancelButtonText : "Cancel";
        
        var popup = popupService.getPopup(true);
        var confirmHTML = "";
        if (title)
        {
            confirmHTML += "<div class=\"modal-header\"><h1>"+title+"</h1></div>";
        }
        confirmHTML += "<div class=\"modal-body\">"+actionText+"</div>"
                    +    "<div class=\"modal-footer\">";
        if (actionFunction)
        {
            confirmHTML += "<button class=\"btn btn-primary\" ng-click=\""+actionFunction+"\">"+actionButtonText+"</button>";
        }
        else
        {
            confirmHTML += "<button class=\"btn btn-primary\">"+actionButtonText+"</button>";
        }
        if (cancelFunction)
        {
            confirmHTML += "<button class=\"btn btn-cancel\" ng-click=\""+cancelFunction+"\">"+cancelButtonText+"</button>";
        }
        else
        {
            confirmHTML += "<button class=\"btn btn-cancel\">"+cancelButtonText+"</button>";
        }
        confirmHTML += "</div>";
        popup.html(confirmHTML);
        if (!actionFunction)
        {
            popup.find(".btn-primary").click(function () {
                popupService.close();
            });
        }
        if (!cancelFunction)
        {
            popup.find(".btn-cancel").click(function () {
                popupService.close();
            });
        }
        popupService.compileAndRunPopup(popup, scope, options);

    }

    // Loads the popup
    popupService.load = function(url, scope, options)
    {
        var htmlPage = '<div class="modal-header"><h1>Header</h1></div><div class="modal-body">Body</div><div class="modal-footer"><button class="btn btn-primary" ng-click="doIt()">Do it</button><button class="btn btn-cancel" ng-click="cancel()">Cancel</button></div>';

        $http.get(url).success(function (data) {
        
            var popup = popupService.getPopup(true);
            // Tried getting this to work with the echo and a post, with no luck, but this gives you the idea
            // popup.html(data);
            popup.html(htmlPage);
            popupService.compileAndRunPopup(popup, scope, options);
        });    
    }

    
    popupService.close = function()
    {
        var popup = popupService.getPopup()
        if (popup)
        {
            popup.modal('hide');
        }
    }

    return popupService;

});

angular.module('popup', ['popup.directives', 'popup.service']);