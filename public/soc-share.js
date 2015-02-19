"use strict";

var SocShare = 
{
    
    show: function(url, windowHeight, windowWidth)
    {
        var height = windowHeight || 250;
        var width  = windowWidth || 450;
        
        var top  = (window.screen.height / 2) - (height / 2);
        var left = (window.screen.width / 2) - (width / 2);
        
        return window.open(url, 'share', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, copyhistory=no, width='+ width +', height='+ height +', top='+ top +', left='+ left);
    } // end show
    
};
