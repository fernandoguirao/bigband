
  // SWIPABLE PANEL IS THE OBJECT TO MANAGE THE LEFT PANEL

  // TO USE THIS PANEL IT IS NECESARY:
    // JQUERY.JS

  // IF YOU ALSO WANT TO ADD SWIPE EVENTS IT, IS NECESARY:
    // HAMMER.JS
    // JQUERY.HAMMER.JS


  //        INSTRUCTIONS        //


// TO INITILIZE THE PANEL JUST CALL var my_panel = new swipablePanel(settings), where:

  /*  
    my_panel    : IS THE NAME OB THE OBJETS AN IT IS UP TO YOU

    OPTIONS:

      settings = {
        panel     : $('#panel') -> IS THE JQUERY SELECTOR OF YOUR PANEL THAT SULD BE A DIRECT BODY CHILDREN
        web       : $('#app')   -> IS THE JQUERY SELECTOR OF YOUR WEB CODE THAT SULD BE A DIRECT BODY CHILDREN
        touchable : boolean     -> SET TO TRUE TO ALLOW TOUCHABLE EVENTS, DEFAULT FALSE.
        distance  : integer     -> MINIMUN DISTANCE TO START THE ANIMATION, DEFAULT 80.
      }
 
    METHODS:
  
      my_panel.open()         -> OPEN THE PANEL
      my_panel.close()        -> CLOSE THE PANEL
      my_panel.switchPanel()  -> OPEN THE PANEL IF IT IS CLOSE AND CLOSE IT IF IT IS OPEN

*/
var swipablePanel = function (settings) {
  'use strict'

  var defaults = settings || {};

  this.open = function () {
    $panel.addClass('open');
    $web.addClass('moved');
    $web.addClass('fixeded');
  }
  this.close = function () {
    $panel.removeClass('open');
    $web.removeClass('moved');
    $web.on('transitionend', function () {
      if (!$panel.hasClass('open')) {
        $web.removeClass('fixeded');
      }
    });
  }
  this.switchPanel = function () {
    $('.switchPanel').click(function () {
      $panel.hasClass('open') ? self.close() : self.open();
      return false;
    });
    $('.closePanel').click(function () {
      self.close();
      return false;
    });
    $('.openPanel').click(function () {
      self.open();
      return false;
    });
    $web.click(function(){
      $panel.hasClass('open') ? self.close() : false;
    });
  }
  if (defaults.touchable){
    var touchable = function () {
      $body.hammer().on("panleft panright", function (ev) {
        var panelState = $panel.hasClass('open');
        if (ev.type === 'panleft' && panelState && ev.gesture.distance > distance) {
          self.close();
        }
        if (ev.type === 'panright' && !panelState && ev.gesture.distance > distance) {
          self.open();
        }
      });
    }
  }
  var error = function(error){
    console.log('%cSwipable panel error:', 'color: red; font-size: 16px' , error)
    return false;
  }

  var self     = this;
  var $body    = $('body');
  var $panel   = defaults.panel || error('It is necesary to indicate your panel id');
  var $web     = defaults.web   || error('It is necesary to indicate your web main content id');
  var distance = defaults.distance ?  parseInt(defaults.distance) : 80;

  defaults.touchable ? touchable() : false;
  this.switchPanel();
  return;
}