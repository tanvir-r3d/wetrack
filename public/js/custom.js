(function($){
  'use strict';
    $(window).on('load', function () {
        if ($(".spinner-wrapper").length > 0)
        {
            $(".spinner-wrapper").fadeOut("slow");
        }
    });
})(jQuery)