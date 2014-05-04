<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--<title><?php page_title(); ?></title>-->
        
        <title>WELCOME to the DIVE BARS (NYC BARS)</title>
        <META name="description" content="NYC Bars providing Upper West Side and Manhattan wine tastings, food, boubons, single malt scotches and tequilas" />
        
        <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo get_fonts_stylesheet_uri(); ?>" rel="stylesheet" type="text/css" />
        <?php wp_head(); ?>  
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

        <script type="text/javascript">
            (function($) {
 
                /*
                 *  render_map
                 *
                 *  This function will render a Google Map onto the selected jQuery element
                 *
                 *  @type	function
                 *  @date	8/11/2013
                 *  @since	4.3.0
                 *
                 *  @param	$el (jQuery element)
                 *  @return	n/a
                 */
 
                function render_map( $el ) {
 
                    // var
                    var $markers = $el.find('.marker');
 
                    // vars
                    var args = {
                        zoom		: 16,
                        center		: new google.maps.LatLng(0, 0),
                        mapTypeId	: google.maps.MapTypeId.ROADMAP
                    };
 
                    // create map	        	
                    var map = new google.maps.Map( $el[0], args);
 
                    // add a markers reference
                    map.markers = [];
 
                    // add markers
                    $markers.each(function(){
 
                        add_marker( $(this), map );
 
                    });
 
                    // center map
                    center_map( map );
 
                }
 
                /*
                 *  add_marker
                 *
                 *  This function will add a marker to the selected Google Map
                 *
                 *  @type	function
                 *  @date	8/11/2013
                 *  @since	4.3.0
                 *
                 *  @param	$marker (jQuery element)
                 *  @param	map (Google Map object)
                 *  @return	n/a
                 */
 
                function add_marker( $marker, map ) {
 
                    // var
                    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
 
                    // create marker
                    var marker = new google.maps.Marker({
                        position	: latlng,
                        map			: map
                    });
 
                    // add to array
                    map.markers.push( marker );
 
                    // if marker contains HTML, add it to an infoWindow
                    if( $marker.html() )
                    {
                        // create info window
                        var infowindow = new google.maps.InfoWindow({
                            content		: $marker.html()
                        });
 
                        // show info window when marker is clicked
                        google.maps.event.addListener(marker, 'click', function() {
 
                            infowindow.open( map, marker );
 
                        });
                    }
 
                }
 
                /*
                 *  center_map
                 *
                 *  This function will center the map, showing all markers attached to this map
                 *
                 *  @type	function
                 *  @date	8/11/2013
                 *  @since	4.3.0
                 *
                 *  @param	map (Google Map object)
                 *  @return	n/a
                 */
 
                function center_map( map ) {
 
                    // vars
                    var bounds = new google.maps.LatLngBounds();
 
                    // loop through all markers and create bounds
                    $.each( map.markers, function( i, marker ){
 
                        var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
 
                        bounds.extend( latlng );
 
                    });
 
                    // only 1 marker?
                    if( map.markers.length == 1 )
                    {
                        // set center of map
                        map.setCenter( bounds.getCenter() );
                        map.setZoom( 16 );
                    }
                    else
                    {
                        // fit to bounds
                        map.fitBounds( bounds );
                    }
 
                }
 
                /*
                 *  document ready
                 *
                 *  This function will render each map when the document is ready (page has loaded)
                 *
                 *  @type	function
                 *  @date	8/11/2013
                 *  @since	5.0.0
                 *
                 *  @param	n/a
                 *  @return	n/a
                 */
 
                $(document).ready(function(){
 
                    $('.acf-map').each(function(){
 
                        render_map( $(this) );
 
                    });
 
                });
 
            })(jQuery);
        </script>

    </head>

    <body>
        <div id="container">
            <div id="layout">

                <header>

                    <div class="social">
                        <ul>
                            <li class="facebook"><a href="<?php fb_link(); ?>" target="_blank">facebook</a></li>
                            <li class="twitter"><a href="<?php twitter_link(); ?>" target="_blank">twitter</a></li>
                            <li class="instagram"><a href="<?php instagram_link(); ?>" target="_blank">instagram</a></li>

                        </ul>
                    </div>

                    <?php get_search_form(); ?>

                    <div id="logo">
                        <a href="/"><img src="<?php images('logo.png'); ?>" alt="Dive Bar" /></a>
                        <?php display_menu('locations_navigation', '', '', ''); ?>
                    </div>
                    <nav>
                        <?php display_menu('header_navigation', '', '', ''); ?>
                    </nav>
                    
                    <nav class="menu-nav">
                        <?php display_menu('menu_navigation', '', '', ''); ?>
                    </nav>

                    <div class="clr"></div>
                </header>
