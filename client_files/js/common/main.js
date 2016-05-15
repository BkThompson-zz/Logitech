$(function(){	
	$('.tooltipTrigger').tooltip();
	
	if($('#locationSwitcher form[name="changeLanguage"]').length > 0) {
		$('#locationSwitcher img').css({'margin':'8px 10px 0 5px'});
	}
			

	// ==Language selection 
	$('#language').change(function(){
		var actionurl = $(document.changeLanguage).attr('action');
		var getlang = actionurl.split('/')[1];
		var changeurl = actionurl.replace(getlang,this.value);
		window.location.href = changeurl;
	});	
		
	// ==open multiple pop-up boxes 
	function modals(id) {
		$('.modal').modal('hide');
		$('#'+id).modal('show');
	};	   

   	// ==cookie notice
	$('.cookie-message').bind('closed.bs.alert', function () {
		$('.cookie-notice').hide();	  
	});
	
	//resize footer based off of footer c-wrap	
	footerHM();
	
	$(window).resize(function() {
		footerHM();
	}).load(function() {
		footerHM();
	});			
		
		
}); // end docready


// ==PDP Detail Page Functions

// ==onhover color switcher for galleries 
function galleryColorSwitcher(){
	$('.imgGallery').each(function() {

		// ==modal color popup selection image swap
		$(this).closest('#cta-Both,#cta-Colors').find('.colorSwatches img').on('mouseenter mouseleave', function(){
			//$('#overlayButton').attr('href',$(this).attr('data-value'));
		}).on('click', function(){
		var Domain = $(this).attr('data-oosval').split('|')[0];
		var SiteID = $(this).attr('data-oosval').split('|')[1];
		var PN = $(this).attr('data-oosval').split('|')[2];
		var FlipVal = $(this).attr('data-DRFlip');
			$('#overlayButton').attr('href',$(this).attr('data-value'));
			$('label').removeClass('selected');
			$(this).parent('label').addClass('selected');
			if (FlipVal == 1)
			{
			  $.ajax({
			    type: "GET",
			    url: "http://"+Domain+"/store/"+SiteID+"/DisplayDRProductInfo/version.2/output.xml/externalReferenceID."+PN+"/content.stockStatus",
			    dataType: "xml",
			    success: function(xml){
			    $(xml).find('product').each(function(){
			      var StockStatus = $(this).find('status').text();
				if (StockStatus == 'Out Of Stock') {
					$('.modal-body #out_of_stock').css('display','block');
				}
				else
					$('.modal-body #out_of_stock').css('display','none');
			    });
			  },
			  error: function() {
			    alert("An error occurred while processing XML file.");
			  }
			  });
			}
			else
			{
			if($(this).attr('data-inventoryflag') == 0 && $(this).attr('data-buystatus') == 1)
				$('.modal-body #out_of_stock').attr('style','display:block');
			else
				$('.modal-body #out_of_stock').attr('style','display:none');						
			}
		});
		
		// ==See Colors image swap
		var $gallery = $(this).find('.colorSwatches img').parents('.imgGallery');
		$(this).find('.colorSwatches img').on('mouseenter mouseleave', function(){
			$('.imageSwap',$gallery).not(document.getElementById('overlayImage')).attr('src',$(this).attr('data-hover'));
		}).on('click', function(){
			$('.imageSwap',$gallery).attr('src',$(this).attr('data-hover'));
			$('.colorSwatches span').removeClass('selected');
			//$(this).parent('span').addClass('selected');				
		});	
	});
}

// ==setup image gallery rollover ID 
function galleryRolloverID(){
	$('.imgGallery .tab-content .next').click(function(){
	  var nextId = $(this).parents('.tab-pane').next().attr("id");
	  $('[href=#'+nextId+']').tab('show');
	});
}	  

// ==move hero depending on height of gradient fade element
function heroGradientGrow(){
	$('.gradient.topFade').css('padding-bottom', ($('.topFade').height()/ 3.1));
	$('section.hero').css('padding-top', ($('.topFade').height()));
	
	$(window).resize(function() {
		$('.gradient.topFade').css('padding-bottom', ($('.topFade').height()/ 3.1));	
		$('section.hero').css('padding-top', ($('.topFade').height()));
	});
}	

function heroGradientNormal(){
	$('.gradient.noFade').css('padding-bottom', ($('.noFade').height()/ 75));
	$('section.hero').css('padding-top', ($('.noFade').height()));
	
	$(window).resize(function() {
		$('.gradient.noFade').css('padding-bottom', ($('.noFade').height()/ 75));	
		$('section.hero').css('padding-top', ($('.noFade').height()));
	});
}		


// ==Global Functions

// ==hero Carousels function
function heroCarousels(){
	// ==setup Carousels 
	var heroCarousels = $('.carousel.slide')
		/* ==Options for carousel 
			interval: 80000 or false
			pause: hover,
			wrap: true               */
	heroCarousels.carousel({
		interval: false
	});
	
	// ==pdp swipe functionality 
	heroCarousels.swiperight(function() {  
		$(this).carousel('prev');  
	});  
	heroCarousels.swipeleft(function() {  
		$(this).carousel('next');  
	});
}
   
// ==magnific video popup function
function videoPopup(){
	$('.magVideos').magnificPopup({
		disableOn: 700,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false
	});	 	   
}
   
// ==text Swap
function readMore() {
	$('a.toggleBtn').on('click', function() {
		var el = $(this);
		if (el.text() == el.data("text-swap")) {
			el.text(el.data("text-original"));
		} else {
			el.data("text-original", el.text());
			el.text(el.data("text-swap"));
		}
	});		
}	
		
//resize footer based off of footer c-wrap	
function footerHM(){	
	var $this = $('#footer .c-wrap');
    var parentwidth = $this.innerWidth();
	var parentheight = $this.innerHeight();
	$('.footerMH').css({'height':parentheight});
}
