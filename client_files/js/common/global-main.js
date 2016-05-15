	// ==magnific video popup function
	$('a[href*="youtube"], a[href*="youku"], a[href*="metacafe"], a[href*="vimeo"], a[href*="dailymotion"]').magnificPopup({
		disableOn: 960,
		removalDelay: 160,
		preloader: true,
		fixedContentPos: false,
		type: 'iframe',
		iframe: {
			patterns: {
			    youtube: {
			        index : 'youtube.com/',
			        id: 'v=',
			        src : '//www.youtube.com/v/%id%?hl=en&fs=1&autoplay=1&version=3&enablejsapi=1&playerapiid=ytplayer'
			    },		    
			    youku: {
			        index: 'v.youku.com/v_show',
			        id: '',
			        src: '//player.youku.com/player.php/sid/%id%/v.swf;autostart=true'
			    },  
			    metacafe: {
			        index : 'metacafe.com/watch', 
			        id: 'watch/',
			        src: '//www.metacafe.com/fplayer/%id%/.swf'
			    },
			    vimeo: {
			        index : 'vimeo.com/',
			        id: '.com/',
			        src : '//www.vimeo.com/moogaloop.swf?clip_id=%id%'
			    },
			    dailymotion: {
			        index : 'dailymotion.com/video', //one issue is that some dailymotion vids are really atom films
			        id: 'video/',
			        src : '//www.dailymotion.com/swf/%id%?related=0&autoplay=1'
			    }
		    },
			srcAction: 'iframe_src' 
	    },
		callbacks: {
            open: function () {
                // set up the handlers
                player.addEvent('ready', function (id) {
                    player.addEvent('finish', function () {
                        $.magnificPopup.close();
                    });
                });
            }
        }	    
	    		
	});	


   	// ==select list restyled cross-broswer
	Select.init({
	  className: 'select-theme-chosen'
	});

});

