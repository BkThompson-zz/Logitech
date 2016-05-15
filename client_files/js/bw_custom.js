/* BW JS starting template for JS / JQuery customizations. All customizations will be stored in the BW_JS object - modify as needed */
window.BW_JS = { wceinit:function(){ var c=document.getElementsByTagName("body")[0].className,p,f,t=c.match(/node-type-(\S+)/i);if(!t){t=c.match(/-in\spage-(\S+)/i);if(t)p=t[1]}else{p='node-type-'+t[1]}

//Customization for all pages here


/*
 $(document).ready(function() {

  $('.views-row-1 img').wrap("<a href='http://news.logitech.com/press-release/consumer-products/introducing-logitech-keys-go-most-portable-keyboard-designed-ipad-ma'</a>");

  $('.views-row-2 img').wrap("<a href='http://news.logitech.com/press-release/consumer-products/logitech-g-unveils-g302-daedalus-prime-moba-gaming-mouse'</a>");

  $('.views-row-3 img').wrap("<a href='http://logitech.newshq.businesswire.com/press-release/consumer-products/logitech-harmony-extends-its-expertise-controlling-living-room-entir'</a>");

  $('.views-row-4 img').wrap("<a href='https://logitech.newshq.businesswire.com/press-release/consumer-products/logitech-engineers-most-advanced-mechanical-gaming-keyboard-world'</a>");

}); 

*/


switch(p){
    
    case 'newsroom-home':
    case 'investors': 

        //customizations for the home page here
    
    break;
    case 'press-releases':
    case 'taxonomy':
        
        //customizations for the press release list view and taxonomy list view here
        
    break;
    case 'node-type-press-release':

        //customizations for the press release node here
        
    break;
    
    /* Additional pages below - uncomment to activate or create new cases
    case 'user':
        
        
    break;
    case 'multimedia':
        
        
    break;
    case 'shareholder-services':
        
        
    break;
    case 'financial-reports':
        
        
    break;
    case 'sec-filings':
        
        
    break;
    case 'stock-information':
        
        
    break;
    case 'events-presentations':
        
        
    break;
    case 'event':
        
        
    break;
    case 'financial-reports':
        
        
    break;
    */

}

}}; $(document).ready(function(){BW_JS.wceinit()});