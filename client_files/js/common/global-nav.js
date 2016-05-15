function GlobalNav () {

    (function($){

    var that = this;
    this.intOpen = 0;
    this.intResize = 0;

    //get the proper width that will match the media query
    this.viewport = function() {
        var e = window, a = 'inner';
        if (!('innerWidth' in window )) {
            a = 'client';
            e = document.documentElement || document.body;
        }
        return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
    }

    // for browsers/desktops
    // ==on primary level hover functions
    this.openSecondaryNav =function(evt){
        evt.preventDefault();
        var target = this;

        $('div.global-nav div.tertiary-bar').hide();

        if ($('div.global-nav div.primary ul.primary li').hasClass('open')){
            that.showSecondaryNav(target);
        } else {
            that.intOpen = setTimeout(function(){
                that.showSecondaryNav(target);
            }, 200);
        }
    }

    // ==show secondary level
    this.showSecondaryNav = function(target){
        var parent = $(target).closest('li');
        var element = $(target);

        $('div.global-nav').addClass('open');
        $('div.global-nav .open').removeClass('open');
        parent.addClass('open');
        var nav = element.attr('data-id');

        var pos = parent.position().left;
        var sub = $('div.global-nav div.secondary ul.' + nav);
        var list = sub.find('li');

        sub.addClass('open');

        // ==figure out the secondary height
        var w = 0;

        list.each(function(index,element){
            w += $(element).width();
        });

        var uw = sub.width()+1;

        if (w > uw){
            var mw = Math.floor(90/list.length);
            list.css({'max-width': '17%'})
        } else {
            list.css({'max-width': 'auto'})
        }

        $('div.global-nav div.navbars div.secondary').height(0);

        var h = 0;
        list.find('span.lbl').each(function(index,element){
            var eh = $(element).height();
            if (eh > h){
                h = eh;
            }
        });

        var minH = parseInt($('div.global-nav div.navbars div.secondary').css('min-height'));

        if (h > minH){
            h+=10;
        }


        $('div.global-nav div.background div.secondary-bar').height(h);
        $('div.global-nav div.navbars div.secondary').height(h);
        $('div.global-nav div.navbars div.tertiary').css({'top': $('div.global-nav div.background div.primary-bar').height() + $('div.global-nav div.background div.secondary-bar').height()});

        var w = sub.width();
        //var gw = $('div.global-nav div.container').width() - (parseInt($('div.global-nav div.container').css('padding-left')) + parseInt($('div.global-nav div.container').css('padding-right')));
        var gw = $('div.global-nav div.navbars').width() - (parseInt($('div.global-nav div.navbars').css('padding-left')) + parseInt($('div.global-nav div.navbars').css('padding-right')));

        if ((w+pos) > gw){
            sub.css({'left': 'auto', 'right':'0'});
        } else {
            sub.css({'left': pos, 'right':'auto'});
        }

        sub.addClass('open');


    }

    // ==show tertiary level
    this.showTertiaryNav = function(evt){
        evt.preventDefault();
        var parent = $(this).parent();
        var element = $(this);

        $('div.global-nav .secondary li.open').removeClass('open');
        $('div.global-nav .tertiary .open').removeClass('open');
        $('div.global-nav div.tertiary').addClass('open');


        var nav = element.attr('data-id');
        var pos = parent.position().left + parent.parent().position().left;
        var sub = $('div.global-nav div.tertiary ul.' + nav);
    
     if (sub.length > 0){
        var w = sub.width();
        //var gw = $('div.global-nav div.container').width() - (parseInt($('div.global-nav div.container').css('padding-left')) + parseInt($('div.global-nav div.container').css('padding-right')));
        var gw = $('div.global-nav div.navbars').width() - (parseInt($('div.global-nav div.navbars').css('padding-left')) + parseInt($('div.global-nav div.navbars').css('padding-right')));

        if ((w+pos) > gw){
            sub.css({'left': 'auto', 'right':'0'});
        } else {
            sub.css({'left': pos, 'right':'auto'});
        }


        sub.addClass('open');
        parent.addClass('open');

        sub.find('span.lbl').removeAttr('style');

        var h = 0;
        sub.find('span.lbl').each(function(index,element){
            var eh = $(element).height();
            if (eh > h){
                h = eh;
            }
        });

        sub.find('span.lbl').css({'height':h+10});

        var secondaryBar = $('div.global-nav div.background div.secondary-bar');

        $('div.global-nav div.background div.tertiary-bar').css({top: secondaryBar.height() + secondaryBar.position().top, height: $('div.global-nav div.tertiary').height()});
        $('div.global-nav div.secondary ul.' + nav).addClass('open');
        $('div.global-nav div.tertiary-bar').show();
        } else {
            $('div.global-nav div.tertiary-bar').hide();
        }
    }

    // ==onmouseout hide
    this.hideGlobalNav = function(evt){

        evt.preventDefault();


        $('div.global-nav .open').removeClass('open');
        $('div.global-nav').removeClass('open');
        $('div.global-nav div.background div.tertiary-bar').hide();
        clearTimeout(that.intOpen);
    }

    // for tablet/mobile devices
    // ==nav toggle section
    this.toggleMobileNav = function(evt){
        evt.preventDefault();

        $('div.toggle-nav').toggleClass('open');
        $('div.global-nav').toggleClass('open');
        $('div.global-nav ul.primary').toggleClass('open');
    }

    // ==show tablet/mobile Secondary nav
    this.showMobileSecondaryNav = function(evt){
        evt.preventDefault();

        var nav = $(this).attr('data-id');
        var parent = $(this).parent();

        var isOpen = parent.hasClass('open');

        var otherOpen = parent.parent().find('li').hasClass('open');
        var delay = otherOpen == true ? 500 : 100;

        $('div.global-nav li.open').removeClass('open');

        if (isOpen == false){
            if (parent.find('ul.sub-nav').length == 0){
                var subnav = $('div.secondary ul.' + nav).clone();
                parent.append(subnav);
                subnav.addClass('sub-nav');
                subnav.find('a').on('click', that.showMobileTertiaryNav);
            }

            setTimeout(function(){
                parent.addClass('open');
            },delay) ;

        } else {
            parent.removeClass('open');
            parent.find('ul.open').removeClass('open');
        }
        return false;

    }

    // ==show tablet/mobile tertiary nav
    this.showMobileTertiaryNav = function(evt){

        evt.preventDefault();
        var nav = $(this).attr('data-id');
        var parent = $(this).parent();

        var isOpen = parent.hasClass('open');

        var otherOpen = parent.parent().find('li').hasClass('open');
        var delay = otherOpen == true ? 1000 : 50;

        parent.parent().find('li.open').removeClass('open');

        if (isOpen == false){

            if (parent.find('ul.sub-nav').length == 0){

                var subnav = $('div.tertiary ul.' + nav).clone();
                subnav.addClass('sub-nav');
                parent.append(subnav);
            }

            setTimeout(function(){
                parent.addClass('open');
                $('html, body').animate({'scrollTop' : parent.position().top});
            },delay) ;

        }
        return false;
    }


    this.init = function(){
        clearTimeout(that.intResize);

        //drop any listeners
        $('div.global-nav div.toggle-nav').off('click');
        $('div.global-nav ul.primary>li>a').off('click');
        $('div.global-nav div.primary ul li a').off('mouseenter');
        $('div.global-nav div.secondary ul li a').off('mouseenter');
        $('div.global-nav ul.sub-nav li a').off('click');
        $('div.global-nav').off('mouseleave');
        $('div.global-nav ul.sub-nav').remove();
        $('div.global-nav .open').removeClass('open');
        $('div.global-nav').removeClass('open');

        //reset any inline styles
        $('div.global-nav').removeAttr('style');
        $('div.global-nav div.background div.primary-bar').removeAttr('style');
        $('div.global-nav div.background div.secondary-bar').removeAttr('style');
     $('div.global-nav div.background div.tertiary-bar').removeAttr('style');
        $('div.global-nav div.primary ul').removeAttr('style');
        $('div.global-nav div.primary ul li').removeAttr('style');
        $('div.global-nav div.secondary ul').removeAttr('style');
        $('div.global-nav div.secondary ul li').removeAttr('style');
        $('div.global-nav div.navbars div.primary').removeAttr('style');
        $('div.global-nav div.navbars div.secondary').removeAttr('style');
        $('div.global-nav div.navbars div.tertiary').removeAttr('style');
        $('div.global-nav div.tertiary ul').removeAttr('style');

        if (that.viewport().width <= 1024){
            //$('div.global-nav div.background div.primary-bar').css({'height': 'auto'});
            $('div.global-nav div.navbars div.primary').css({'height': 'auto'});
            //$('div.global-nav div.background div.secondary-bar').css({'top':'auto'});
            $('div.global-nav div.navbars div.secondary').css({'top':'auto'});
            $('div.global-nav ul.primary li').css({'max-width': 'auto'})

            $('div.global-nav div.toggle-nav').on('click', that.toggleMobileNav);
            $('div.global-nav ul.primary>li>a').on('click', that.showMobileSecondaryNav);

        } else {
            //figure out the primary height
            var w = 0;

            $('div.global-nav ul.primary li').each(function(index,element){
                w += $(element).width();
            });

            var uw = $('div.global-nav ul.primary').width()+1;

            if ((w + 1) >= uw){
                var mw = Math.floor(99/$('div.global-nav ul.primary li').length);
                $('div.global-nav ul.primary li').css({'max-width': mw + '%'})
            } else {
                $('div.global-nav ul.primary li').css({'max-width': 'auto'})
            }



            var minH = parseInt($('div.global-nav div.navbars div.primary').css('min-height'));
            $('div.global-nav').height(minH);
            $('div.global-nav div.background div.primary-bar').height(minH);
            $('div.global-nav div.navbars div.primary').height(minH);

            var h = 0;
            $('div.global-nav ul.primary li a span.lbl').each(function(index,element){
                var eh = $(element).height();
                if (eh > h){
                    h = eh;
                }
            });

            if (h > minH){
                h+=10;
            }

            $('div.global-nav').height(h);
            $('div.global-nav div.background div.primary-bar').height(h);
            $('div.global-nav div.navbars div.primary').height(h);
            $('div.global-nav div.background div.secondary-bar').css({'top':h});
            $('div.global-nav div.navbars div.secondary').css({'top':h});

            $('div.global-nav div.primary ul li a').on('mouseenter', that.openSecondaryNav);
            $('div.global-nav div.secondary ul li a').on('mouseenter', that.showTertiaryNav);
            $('div.global-nav').on('mouseleave', that.hideGlobalNav);


        }

    }

    this.resized = function(){
        if (that.intResize){
            clearTimeout(that.intResize);
        }
        that.intResize = setTimeout(that.init, 200);
    }




    $(window).on('resize', that.resized);
    that.init();

    return this;

    })(logitech);
}

logitech(document).ready(function(){
    var globalNav = new GlobalNav();
})