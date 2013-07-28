$(window).load(function(){
    "use strict";
  $('input.customCheckbox').customCheckbox();
  $('select.customSelect').customSelect();
  var gal = jQuery('div.slider1').gallery({
    duration: 800,
    autoRotation: 5000,
    switcher: 'ul.nav > li',
    listOfSlides: 'div.hold > ul > li',
    onChange: function(){
      jQuery('div.slider1 div.line > div').css({left: 100/5*gal.active + '%'});
    }
  });
  jQuery('div.slider1 div.line > div').css({left: 100/5*gal.active + '%'});
  jQuery('div.slider2').gallery({
    infinite: true,
    duration: 1200,
    slideElement: 1,
    listOfSlides: '> div.hold > ul > li'
  });
	$("#city-select").change(function() {
		var sel = $("#city-select option:selected");
		setCity(sel.val(), sel.text());
	});
	$("#size-select").change(function() {
		var sel = $("#size-select option:selected");
		getShops(sel.val());
	});
  initLoadPage();
  ajaxLoad();
  initGallery();
  initNav();
});

function initNav(){
    "use strict";
  $('.menu-hold').each(function(){
    var hold = $(this);
    var place = $('.menu-place');
    hold.removeClass('top');
    place.removeClass('top');
    var top = hold.offset().top;
      if($(window).scrollTop() > top){
        hold.addClass('top');
        place.addClass('top');
      }
      else{
        hold.removeClass('top');
        place.removeClass('top');
      }

    $(window).scroll(function(){
      if($(window).scrollTop() > top){
        hold.addClass('top');
        place.addClass('top');
      }
      else{
        hold.removeClass('top');
        place.removeClass('top');
      }
    });
  });
}

function initGallery(){
    "use strict";
  jQuery('div.slider').gallery({
    duration: 500,
    listOfSlides: 'div.hold > ul > li',
    direction: true
  });
  $('.zoom-pic').jqzoom({
    alwaysOn:false,
    zoomWidth: 551,
    zoomHeight: 460,
    xOffset:10,
    yOffset:0,
    title: false
  });
  $('.zoomWindow').live('mouseover', function(){$(this).css({display: 'none'});});
  $('.gallery').each(function(){
    var hold = $(this);
    var link = hold.find('div.hold > ul > li > a');
    var big = hold.find('.big');

    link.click(function(){
      big.empty().append('<a class="zoom-pic" title="'+$(this).attr('title')+'" href="'+$(this).attr('data-big')+'"><img src="'+$(this).attr('href')+'" alt=" "><span class="zoom"></span></a>');
      if(typeof $.fn.jqzoom === 'function') {
        $('.zoom-pic').jqzoom({
            alwaysOn:false,
            zoomWidth: 551,
            zoomHeight: 460,
            xOffset:10,
            yOffset:0,
            title: false
        });
      }
      return false;
    });
  });
}

function ajaxLoad(){
    "use strict";
  $('.ajax-load').each(function(){
    var hold = $(this);
    var input = hold.find('input:checkbox');
    var select = hold.find('select');
    var slider = hold.find('.ui-slider');
    var min = hold.find('.slider-values .l');
    var max = hold.find('.slider-values .r');

    input.change(function(){
      reloadPage();
    });
    select.change(function(){
      reloadPage();
    });
    if (slider.length > 0 && typeof $.fn.slider === 'function') {
      slider.slider({
        range: true,
        min: parseInt(min.val(),10),
        max: parseInt(max.val(),10),
        values: [ min.val(), max.val() ],
        slide: function( event, ui ) {
          min.val(ui.values[0].addSpace());
          max.val(ui.values[1].addSpace());
        },
        stop: function() {
          reloadPage();
        }
      });
      min.val(slider.slider("values", 0).addSpace());
      max.val(slider.slider("values", 1).addSpace());
    }

    function reloadPage(){
      var filter_form = $('#filter_form');
      var sort_form = $('#sort_form');
      $.ajax({
        data: filter_form.serialize() + '&' + sort_form.serialize()+"&json=y",
        dataType: 'json',
        url: hold.attr('action'),
        success: function(obj){
          if(obj.data.next) {
            $('.mainContent .catalog').empty().append(obj.data.html);
          } else {
            $('.mainContent .catalog').empty().append('<p>Ничего не найдено</p>');
          }  
          $(window).trigger('loadFirst');
        },
        error: function(){alert('Server is unavailable. Refresh the page within 15 seconds.!');}
      });
    }
  });
}

Number.prototype.addSpace=function(){
  "use strict";
  var temp='';
  for(var i=this.toString().length-1;i>=0;i--){
    temp=this.toString().charAt(i)+temp;
    if(((this.toString().length-i)%3)===0){
      temp=' '+temp;
    }
  }
  return temp;
};

function initLoadPage(){
  "use strict";
  $('.mainContent .catalog').each(function(){
    var hold = $(this);
    var obj = {next: 2};
    var flag = true;
    var page = 2;
    $(window).scroll(function(){
      if(obj.next) {
        if($(window).scrollTop() > hold.offset().top + hold.outerHeight(true)-1000 && flag){
          flag = false;
          $.ajax({
            dataType: 'json',
            url: hold.attr('data-page'),
            data: 'PAGEN_1='+page+'&json=y&'+$('.ajax-load').serialize(),
            success: function(obj){
              flag = true;
              if(obj !== null && obj.data.next) {
                hold.append(obj.data.html);
                page++;
              }
              else {
                flag = false;
              }
            },
            error: function(){
              alert('Server is unavailable. Refresh the page within 15 seconds!');
            }
          });
        }
      }
    }).bind('loadFirst', function(){
      obj.next = 2;
      page = 2;
      flag = true;
    });
  });
}
/**
 * jQuery gallery min v1.1.0
 * Copyright (c) 2013 JetCoders
 * email: yuriy.shpak@jetcoders.com
 * www: JetCoders.com
 * Licensed under the MIT License:
 * http://www.opensource.org/licenses/mit-license.php
 **/

jQuery.fn.gallery=function(options){
  "use strict";
  return new Gallery(this.get(0),options);
};
function Gallery(context,options){
  "use strict";
  this.init(context,options);
}
Gallery.prototype={
  options:{},
  init:function(context,options){
    "use strict";
    this.options=jQuery.extend({
      infinite:false,
      active:'active',
      duration:700,
      slideElement:1,
      autoRotation:false,
      effect:false,
      listOfSlides:'ul > li',
      switcher:false,
      disableBtn:false,
      nextBtn:'a.link-next, a.btn-next, .next',
      prevBtn:'a.link-prev, a.btn-prev, .prev',
      circle:true,
      direction:false,
      event:'click',
      IE:false,
      autoHeight:false,
      easing:'swing',
      onChange:function(){}},
      options||{}
    );
    var _el=jQuery(context).find(this.options.listOfSlides);
    if(this.options.effect){
      this.list=_el;
    } else {
      this.list=_el.parent();
    }
    this.switcher=jQuery(context).find(this.options.switcher);
    this.nextBtn=jQuery(context).find(this.options.nextBtn);
    this.prevBtn=jQuery(context).find(this.options.prevBtn);
    this.count=_el.index(_el.filter(':last'));
    if(this.options.switcher) {
      this.active=this.switcher.index(this.switcher.filter('.'+this.options.active+':eq(0)'));
    } else {
      this.active=_el.index(_el.filter('.'+this.options.active+':eq(0)'));
    }    
    if(this.active<0) {
      this.active=0;
    }
    this.last=this.active;
    this.woh=_el.outerWidth(true);
    if(!this.options.direction) {
      this.installDirections(this.list.parent().width());
    } else {
      this.woh=_el.outerHeight(true);this.installDirections(this.list.parent().height());
    }    
    if(!this.options.effect){
      this.rew=this.count-this.wrapHolderW+1;
      this.list.css({position:'relative'}).css(this.dirAnimate());
      this.switcher.removeClass(this.options.active).eq(this.active).addClass(this.options.active);
      if(this.options.autoHeight) {
        this.list.parent().css({height:this.list.children().eq(this.active).outerHeight()});
      }
    }  else {
      this.rew=this.count;
      this.list.css({opacity:0}).removeClass(this.options.active).eq(this.active).addClass(this.options.active).css({opacity:1}).css('opacity','auto');
      this.switcher.removeClass(this.options.active).eq(this.active).addClass(this.options.active);
      if(this.options.autoHeight) {
        this.list.parent().css({height:this.list.eq(this.active).outerHeight()});
      }
    }
    this.flag=true;
    if(this.options.infinite){
      this.count++;
      this.active+=this.count;
      this.list.append(_el.clone());
      this.list.append(_el.clone());
      this.list.css(this.dirAnimate());
    }
    this.initEvent(this,this.nextBtn,true);
    this.initEvent(this,this.prevBtn,false);
    if(this.options.disableBtn){
      this.initDisableBtn();
    }
    if(this.options.autoRotation){
      this.runTimer(this);
    }
    if(this.options.switcher){
      this.initEventSwitcher(this,this.switcher);
    }
  },
  dirAnimate:function(){
    "use strict";
    if(!this.options.direction) {
      return {left:-(this.woh*this.active)};
    } else {
      return{top:-(this.woh*this.active)};
    }
  },
  initDisableBtn:function(){
    "use strict";
    this.prevBtn.removeClass('prev-'+this.options.disableBtn);
    this.nextBtn.removeClass('next-'+this.options.disableBtn);
    if(this.active===0||this.count+1===this.wrapHolderW-1) {
      this.prevBtn.addClass('prev-'+this.options.disableBtn);
    }
    if(this.active===0&&this.count+1===1||this.count+1<=this.wrapHolderW-1) {
      this.nextBtn.addClass('next-'+this.options.disableBtn);
    }
    if(this.active===this.rew) {
      this.nextBtn.addClass('next-'+this.options.disableBtn);
    }
  },
  installDirections:function(temp){
    "use strict";
    this.wrapHolderW=Math.ceil(temp/this.woh);
    if(((this.wrapHolderW-1)*this.woh+this.woh/2)>temp){
      this.wrapHolderW--;
    }
    if(this.wrapHolderW===0){
      this.wrapHolderW=1;
    }
  },
  fadeElement:function(){
    "use strict";
    if(jQuery.browser.msie&&this.options.IE){
      this.list.eq(this.last).css({opacity:0});
      this.list.removeClass(this.options.active).eq(this.active).addClass(this.options.active).css({opacity:'auto'});
    } else { 
      this.list
        .eq(this.last)
        .animate({opacity:0},{
          queue:false,
          easing:this.options.easing,
          duration:this.options.duration});
      this.list
        .removeClass(this.options.active)
        .eq(this.active)
        .addClass(this.options.active)
        .animate({
          opacity:1
          },{
            queue:false,
            duration:this.options.duration,
            complete:function(){
              jQuery(this).css('opacity','auto');
            }
          }
        );
    }
    if(this.options.autoHeight) {
      this.list
        .parent()
        .animate({
          height:this.list.eq(this.active).outerHeight()
          },{
            queue:false,
            duration:this.options.duration
          }
        );
    }
    if(this.options.switcher) {
      this.switcher.removeClass(this.options.active).eq(this.active).addClass(this.options.active);
    }
    this.last=this.active;
  },
  scrollElement:function($this){
    "use strict";
    if(!$this.options.infinite) {
      $this.list.animate(
        $this.dirAnimate(),{
          queue:false,
          easing:$this.options.easing,
          duration:$this.options.duration
        });      
    } else {
      $this.list.animate(
        $this.dirAnimate(),
        $this.options.duration,
        $this.options.easing,
        function(){          
          $this.flag=true;
        }
      );
    }
    if(this.options.autoHeight){
      this.list.parent().animate({height:this.list.children().eq(this.active).outerHeight()},{queue:false,duration:this.options.duration});
    }
    if($this.options.switcher){
      $this.switcher
        .removeClass($this.options.active)
        .eq($this.active/$this.options.slideElement)
        .addClass($this.options.active);
    }
  },
  runTimer:function($this){
    "use strict";
    if($this._t) {
      clearTimeout($this._t);
    }
    $this._t=setInterval(function(){
      if($this.options.infinite) {
        $this.flag=false;
      }
      $this.toPrepare($this,true);
      $this.options.onChange();
    },
    this.options.autoRotation);
  },
  initEventSwitcher:function($this,el){
    "use strict";
    el.bind(
      $this.options.event,
      function(){
        $this.active=$this.switcher.index(jQuery(this))*$this.options.slideElement;
        if($this._t){
          clearTimeout($this._t);
        }
        if($this.options.disableBtn){
          $this.initDisableBtn();
        }
        if(!$this.options.effect){
          $this.scrollElement($this);
        } else { 
          $this.fadeElement();
        }
        if($this.options.autoRotation){
          $this.runTimer($this);
        }
        $this.options.onChange();
        if($this.options.event==='click') {
          return false;
        }
      }
    );
  },
  initEvent:function($this,addEventEl,dir){
    "use strict";
    addEventEl.bind(
      $this.options.event,
      function(){
        if($this.flag){
          if($this.options.infinite){
            $this.flag=false;
          }
          if($this._t){
            clearTimeout($this._t);
          }
          $this.toPrepare($this,dir);
          if($this.options.autoRotation){
            $this.runTimer($this);
          }
          $this.options.onChange();
        }
        if($this.options.event==='click'){
          return false;
        }
      }
    );
  },
  toPrepare:function($this,side){
    "use strict";
    if(!$this.options.infinite){
      if(($this.active===$this.rew)&&$this.options.circle&&side){
        $this.active=-$this.options.slideElement;
      }
      if(($this.active===0)&&$this.options.circle&&!side){
        $this.active=$this.rew+$this.options.slideElement;
      }
      for(var i=0;i<$this.options.slideElement;i++){
        if(side){
          if($this.active+1<=$this.rew){
            $this.active++;
          }
        } else {
          if($this.active-1>=0){
            $this.active--;
          }
        }
      }
    } else {
      if($this.active>=$this.count+$this.count&&side){
        $this.active-=$this.count;
      }
      if($this.active<=$this.count-1&&!side){
        $this.active+=$this.count;
      }
      $this.list.css($this.dirAnimate());
      if(side){
        $this.active+=$this.options.slideElement;
      } else {
        $this.active-=$this.options.slideElement;
      }
    }  
    if(this.options.disableBtn){
      this.initDisableBtn();
    }
    if(!$this.options.effect){
      $this.scrollElement($this);
    } else {
      $this.fadeElement();
    }
  },
  reCalcWidth:function(){
    "use strict";
    this.woh=this.list.children().outerWidth(true);
    if(!this.options.direction){
      this.installDirections(this.list.parent().width());
    } else {
      this.woh=this.list.children().outerHeight(true);
      this.installDirections(this.list.parent().height());
    }
    this.rew=this.count-this.wrapHolderW+1;
    this.list.css({position:'relative'}).css(this.dirAnimate());
  },
  stop:function(){
    "use strict";
    this.options.aR=this.options.autoRotation;
    this.options.autoRotation=false;
    if(this._t){
      clearTimeout(this._t);
    }
  },
  play:function(){
    "use strict";
    if(this._t){
      clearTimeout(this._t);
    }
    this.options.autoRotation=this.options.aR;
    if(this.options.autoRotation){
      this.runTimer(this);
    }
  }
};

jQuery.fn.customSelect = function(options) {
  "use strict";
  var _options = jQuery.extend({
      selectStructure:'<div class="selectArea"><div class="selectIn"><div class="selectText"></div></div></div>',
      selectText:'.selectText',
      selectBtn:'.selectIn',
      selectDisabled:'.disabled',
      optStructure:'<div class="selectSub"><ul></ul></div>',
      maxHeight:false,optList:'ul'
    }, 
    options
  );
  return this.each(function() {
    var select = jQuery(this);
    if(!select.hasClass('outtaHere')) {
      if(select.is(':visible')) {
        var replaced = jQuery(_options.selectStructure);
        var selectText = replaced.find(_options.selectText);
        var selectBtn = replaced.find(_options.selectBtn);
        var selectDisabled = replaced.find(_options.selectDisabled).hide();
        var optHolder = jQuery(_options.optStructure);
        var optList = optHolder.find(_options.optList);
        if(select.attr('disabled')){
          selectDisabled.show();
        }
        select.find('option').each(function() {
          var selOpt = $(this);
          var _opt = jQuery('<li><a href="#">' + selOpt.html() + '</a></li>');
          if(selOpt.attr('selected')) {
            selectText.html(selOpt.html());
            _opt.addClass('selected');
          }
          _opt.children('a').click(function() {
            optList.find('li').removeClass('selected');
            select.find('option').removeAttr('selected');
            $(this).parent().addClass('selected');
            selOpt.attr('selected', 'selected');
            selectText.html(selOpt.html());
            select.change();
            optHolder.hide();
            return false;
          });
          optList.append(_opt);
        });
        replaced.width(select.outerWidth());
        replaced.insertBefore(select);
        replaced.addClass(select.attr('class'));
          optHolder.css({
            width: select.outerWidth(),
            display: 'none',
            position: 'absolute'
          });
        optHolder.addClass(select.attr('class'));
        jQuery(document.body).append(optHolder);

        var optTimer;
        replaced.hover(function() {
          if(optTimer){
            clearTimeout(optTimer);
          }
        }, function() {
          optTimer = setTimeout(function() {
            optHolder.hide();
          }, 200);
        });
        optHolder.hover(function(){
          if(optTimer){
            clearTimeout(optTimer);
          }
        }, function() {
          optTimer = setTimeout(function() {
            optHolder.hide();
          }, 200);
        });
        selectBtn.click(function() {
          if(optHolder.is(':visible')) {
            optHolder.hide();
          }
          else{
            optHolder.children('ul').css({height:'auto', overflow:'hidden'});
            optHolder.css({
              top: replaced.offset().top + replaced.outerHeight(),
              left: replaced.offset().left,
              display: 'block'
            });
            if(_options.maxHeight && optHolder.children('ul').height() > _options.maxHeight){
              optHolder.children('ul').css({height:_options.maxHeight, overflow:'auto'});
            }
          }
          return false;
        });
        select.addClass('outtaHere');
      }
    }
  });
};

jQuery.fn.customRadio = function(options){
  "use strict";
  var _options = jQuery.extend({
    radioStructure: '<div></div>',
    radioDisabled: 'disabled',
    radioDefault: 'radioArea',
    radioChecked: 'radioAreaChecked'
  }, options);
  return this.each(function(){
    var radio = jQuery(this);
    if(!radio.hasClass('outtaHere') && radio.is(':radio')){
      var replaced = jQuery(_options.radioStructure);
      replaced.addClass(radio.attr('class'));
      this._replaced = replaced;
      if(radio.is(':disabled')) {
        replaced.addClass(_options.radioDisabled);
        if(radio.is(':checked')){
          replaced.addClass('disabledChecked');
        }
      } else if(radio.is(':checked')){
        replaced.addClass(_options.radioChecked);
      } else {
        replaced.addClass(_options.radioDefault);
      }
      replaced.click(function(){
        if($(this).hasClass(_options.radioDefault)){
          radio.change();
          radio.attr('checked', 'checked');
          changeRadio(radio.get(0));
        }
      });
      radio.click(function(){
        changeRadio(this);
      });
      replaced.insertBefore(radio);
      radio.addClass('outtaHere');
    }
  });
  function changeRadio(_this){
    $('input:radio[name='+$(_this).attr("name")+']').not(_this).each(function(){
      if(this._replaced && !$(this).is(':disabled')){
        this._replaced.removeClass().addClass(_options.radioDefault);
      }
    });
    _this._replaced.removeClass().addClass(_options.radioChecked);
    $(_this).trigger('change');
  }
};

jQuery.fn.customCheckbox = function(options){
  "use strict";
  var _options = jQuery.extend({
    checkboxStructure: '<div></div>',
    checkboxDisabled: 'disabled',
    checkboxDefault: 'checkboxArea',
    checkboxChecked: 'checkboxAreaChecked'
  }, options);
  return this.each(function(){
    var checkbox = jQuery(this);
    if(!checkbox.hasClass('outtaHere') && checkbox.is(':checkbox')){
      var replaced = jQuery(_options.checkboxStructure);
      replaced.addClass(checkbox.attr('class'));
      this._replaced = replaced;
      if(checkbox.is(':disabled')) {
        replaced.addClass(_options.checkboxDisabled);
        if(checkbox.is(':checked')){
          replaced.addClass('disabledChecked');
        }
      } else if(checkbox.is(':checked')){
        replaced.addClass(_options.checkboxChecked);
      } else {
        replaced.addClass(_options.checkboxDefault);
      }

      replaced.click(function(){
        if(!replaced.hasClass('disabled')){
          if(checkbox.is(':checked')){
            checkbox.removeAttr('checked');
          } else {
            checkbox.attr('checked', 'checked');
          }
          changeCheckbox(checkbox);
        }
      });
      checkbox.click(function(){
        changeCheckbox(checkbox);
      });
      replaced.insertBefore(checkbox);
      checkbox.addClass('outtaHere');
    }
  });
  function changeCheckbox(_this){
    if(_this.is(':checked')){
      _this.get(0)._replaced.removeClass().addClass(_options.checkboxChecked);
    } else {
      _this.get(0)._replaced.removeClass().addClass(_options.checkboxDefault);
    }
    _this.trigger('change');
  }
};
