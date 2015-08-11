<?php  include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
      <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Snapimal - Gotta snap 'em all</title>
        <meta name="description" content="Morphing Buttons Concept: Inspiration for revealing content by morphing the action element" />
        <meta name="keywords" content="expanding button, morph, modal, fullscreen, transition, ui" />
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/component.css" />
        <link rel="stylesheet" type="text/css" href="css/content.css" />
        <script src="js/modernizr.custom.js"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />
        <script src="http://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js"></script>
        <style>
            button:hover {
                background-color: #9C1415;
            }
            .checkbox-label {
                display: inline-block;
            }
            .icheckbox_square-grey {
                display: inline-block;
            }
        </style>
        <link href="square/grey.css" rel="stylesheet">
        <script src="icheck.js"></script>
    </head>
    <body>
        <div class="container">
            <!-- Top Navigation -->

            <header class="codrops-header">
                <img src="img/name.svg" alt="search" class="titleimg"/>

            </header>

            <section>

                <div class="mockup-content">

                    <div class="morph-button morph-button-modal morph-button-modal-2 morph-button-fixed">
                        <button type="button"><img src="img/search.svg" alt="search" class="search-ico"/></button>
                        <div class="morph-content">
                            <div>
                                <div class="content-style-form content-style-form-1" width="">
                                    <span class="icon icon-close">Close the dialog</span>
                                    <form method="get" action="search.php" width="50%">
                                        <p><input type="text" name="search" placeholder="Search..." style=""/></p>
                                        <p><input type="submit" class="end_submit">Search</p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- morph-button -->

                    <div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
                        <button type="button"><img src="img/plus.svg" alt="search" class="search-ico"/></button>

						<!-- New form -->

						<div class="morph-content" style="overflow-y:scroll;">
                            <div>
                                <div class="content-style-form content-style-form-2">
                                    <span class="icon icon-close">Close</span>
                                    <h2>Add an Animal</h2>
                                    <form action="new-find.php" name="new-find" method="post" enctype="multipart/form-data">
                                        <!-- <img src="camera.svg" alt="search" class="search-ico"/> -->
                                        <p><label>Name of Animal</label><input type="text" name="name" placeholder="e.g. Golden Eagle" /></p>
                                        <p><label>Description of Animal</label>
                                            <textarea type="text" max="150" style="height:140px;" name="description" placeholder="e.g. Golden feathers, large wings and a yellow beak." ></textarea>
                                            <div class="browse_back" name="image">
                                            <label class="myLabel" name="image">
                                                <input type="file" name="image" required/>
                                                <span>Browse</span>
                                            </label>
                                            </div>
                                            <input type="int" name="lat" placeholder="Latitude">
                                            <input type="int" name="lon" placeholder="Longitude">
                                            <select class="" name="cat">
                                              <option>Bird</option>
                                              <option>Amphibian</option>
                                              <option>Reptile</option>
                                              <option name="water">Water animal</option>
                                              <option name="mammal">Land Mammal</option>
                                            </select>
                                        <div style="float:left; width:100%; padding:0px 0px 10px 0px;">

                                            <div style="float:left; width:5%; padding:9px 0px 10px 0px">
                                                <input type="checkbox" checked>
                                            </div>

                                            <div style="float:left; width:90%; padding:0px 0px 10px 30px;">
                                              <label class="checkbox-label" style="color:grey !important;">USE MY CURRENT LOCATION</label>
                                            </div>
                                        </div>

                                       <input type="submit" class="end_submit" value="Submit">
                                       <div style="height:120px;">
                                       </div>
                                    </form>
                                </div>
                            </div>
                        </div>

						<!-- End new form -->

                    </div><!-- morph-button -->

                </div><!-- /form-mockup -->
            </section>
            <div class="desc-of-proj">
            <h1>What is it?</h1>
            <p>Snapimal is an online tool for animal entuisiasts to track rare or exciting animals and document it all on a simple, yet informative map.
              The user can select from three different catageries. <ul>
                <li>Birds</li>
                <li>Land Mammals</li>
                <li>Reptiles</li>
                <li>Amphibians</li>
                <li>Water animals</li>
            </ul>
            </div>
        </div><!-- /container -->
        <script src="js/classie.js"></script>
        <script src="js/uiMorphingButton_fixed.js"></script>
        <script>
            (function() {
                var docElem = window.document.documentElement, didScroll, scrollPosition;
                // trick to prevent scrolling when opening/closing button
                function noScrollFn() {
                    window.scrollTo( scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0 );
                }
                function noScroll() {
                    window.removeEventListener( 'scroll', scrollHandler );
                    window.addEventListener( 'scroll', noScrollFn );
                }
                function scrollFn() {
                    window.addEventListener( 'scroll', scrollHandler );
                }
                function canScroll() {
                    window.removeEventListener( 'scroll', noScrollFn );
                    scrollFn();
                }
                function scrollHandler() {
                    if( !didScroll ) {
                        didScroll = true;
                        setTimeout( function() { scrollPage(); }, 60 );
                    }
                };
                function scrollPage() {
                    scrollPosition = { x : window.pageXOffset || docElem.scrollLeft, y : window.pageYOffset || docElem.scrollTop };
                    didScroll = false;
                };
                scrollFn();
                [].slice.call( document.querySelectorAll( '.morph-button' ) ).forEach( function( bttn ) {
                    new UIMorphingButton( bttn, {
                        closeEl : '.icon-close',
                        onBeforeOpen : function() {
                            // don't allow to scroll
                            noScroll();
                        },
                        onAfterOpen : function() {
                            // can scroll again
                            canScroll();
                        },
                        onBeforeClose : function() {
                            // don't allow to scroll
                            noScroll();
                        },
                        onAfterClose : function() {
                            // can scroll again
                            canScroll();
                        }
                    } );
                } );
                // for demo purposes only
                [].slice.call( document.querySelectorAll( 'form button' ) ).forEach( function( bttn ) {
                    bttn.addEventListener( 'click', function( ev ) { ev.preventDefault(); } );
                } );
            })();
            $(document).ready(function(){
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-grey',
                    increaseArea: '20%' // optional
                });
            });
        </script>
        <?php
          $select_from_db = "SELECT * FROM $tbl_name ORDER BY id desc LIMIT 5";
          $result = mysql_query($select_from_db);
          if (!$result) {
            echo "Something went wrong! :(";
            print mysql_error();
          }
          echo '<ul style="width: 100%; padding: 0; margin: 0;">';
          while ($row = mysql_fetch_assoc($result)) {
            echo '<li style="list-style-type: none; float: left; display: inline; margin: 0; height: 100%; background-color: #67C2D4; text-align: center; padding: 0 !important; width: 20%; text-align: center;">
            <div style="display: inline; background-color: white; "><h2>'
            . $row['name'] .
            '<div class="image" style="background-color: white;"> <img class="bottom-images" style="padding: 0 0; width: 100%; background-color: white; margin: 0 0 0 0; " src="image_uploads/'
             . $row['image'] . '" title="' . $row['name'] . '"/></div>
            </h2></div>
            </li>'."\n";
          }
          echo '</ul>';
           print mysql_error();
        ?>
        <?php
        include ('db.php');
        $select_from_db = "SELECT * FROM $tbl_name ORDER BY id desc LIMIT 5";
                  $result = mysql_query($select_from_db);
                  if (!$result) {
                    echo "Something went wrong! :(";
                    print mysql_error();
                  }

                  $markers = '';
                  while ($row = mysql_fetch_assoc($result)) {
                    $markers = $markers
                     . 'L.marker([' . $row['lat'] . ',' . $row['lon'] . '], { icon: ' . $row['cat'] . ', "title":"'
                     . $row['name']
                     . '", "tags":"' . $row['cat'] . '"})
                     .bindPopup("<h1 style=\"color: black; padding: 1em 0 ;\" align=\'center\'>'
                     . $row['name'] . '<img src=\'image_uploads/' . $row['image'] . '\' width=\'80%\'/><h3 style=\"color: black;\">'
                     . $row['description']
                     . '</h3>' . '"),';
                   }
                ?>

        <style>
        .map_wrapper { float:left; height: 40em; width:100%; }
        #map { width:80%; height: 100%; margin: 5% auto !important; border-radius: 4px;}
        .map-wrapper { width: 100%; }
        </style>

        <div class="map_wrapper">
          <div class="show_hide_checkbox_wrapper">

          <div id="brd_checkbox_wrapper" class="checkbox-wrapper">
          <input type="checkbox" class="type_check" name="brd_checkbox" id="brd_checkbox" onclick="fn_brd_checked(this.checked);"/> Hide/Show Birds
          </div>

          <div id="rep_checkbox_wrapper" class="checkbox-wrapper">
          <input type="checkbox" class="type_check" name="rep_checkbox" id="rep_checkbox" onclick="fn_rep_checked(this.checked);"/> Hide/Show Reptiles
          </div>

          <div id="wat_checkbox_wrapper" class="checkbox-wrapper">
          <input type="checkbox" class="type_check" name="wat_checkbox" id="wat_checkbox" onclick="fn_wat_checked(this.checked);"/> Hide/Show Water animals
          </div>

          <div id="amp_checkbox_wrapper" class="checkbox-wrapper">
          <input type="checkbox" class="type_check" name="amp_checkbox" id="amp_checkbox" onclick="fn_amp_checked(this.checked);"/> Hide/Show Amphibians
          </div
          <div id="mam_checkbox_wrapper" class="checkbox-wrapper">
          <input type="checkbox" class="type_check" name="mam_checkbox" id="mam_checkbox" onclick="fn_mam_checked(this.checked);"/> Hide/Show Land mammals
          </div>
              <div id="map"></div>
          </div>




        <script>
        function startup() { for(i=0; i<=markers.length; i++){
        map.addLayer(markers[i]);
        }}
        var map = L.map('map').setView([0, 0], 3);
        L.tileLayer('http://a.tiles.mapbox.com/v3/zsl.map-j9ykp4sl/{z}/{x}/{y}.png', {
            attribution: 'Map hosted by <a href="http://mapbox.com">MapBox</a>',
            maxZoom: 18
        }).addTo(map);
        var LeafIcon = L.Icon.extend({
            options: {
            shadowUrl: '',
                iconSize:     [50, 81],
                shadowSize:   [32, 41],
                iconAnchor:   [24, 41],
                shadowAnchor: [32, 41],
                popupAnchor:  [-3, -76]
            }
        });
        var mammal = new LeafIcon({iconUrl: 'img/mammal.svg'}),
            water = new LeafIcon({iconUrl: 'img/fish.svg'}),
            Amphibian = new LeafIcon({iconUrl: 'img/Amphibian.svg'}),
        	  Reptile = new LeafIcon({iconUrl: 'img/Reptile.svg'});
            Bird = new LeafIcon({iconUrl: 'img/bird.svg'});
        <!-- No Icon in there to cater for the one extra entry -->
        var markers = [
        <?php echo $markers; ?>
        ]
        startup()
        </script>

        <!-- This is our code to show markers
        for(i=0; i<=markers.length; i++){
        if(markers[i] && markers[i].options.tags.indexOf("Mammals")> -1){
        map.addLayer(markers[i]);
        }
        }
        -->



</div>


  <script>
        function fn_mam_checked(mam_checked)
      {
      if(mam_checked)
      {
        for(i=0; i<=markers.length; i++){
          if(markers[i] && markers[i].options.tags.indexOf("Mammals")> -1){
            map.removeLayer(markers[i]);
          }
        }
      }
      else
      {
        for(i=0; i<=markers.length; i++){
          if(markers[i] && markers[i].options.tags.indexOf("Mammals")> -1){
            map.addLayer(markers[i]);
          }
        }
      }
    }
      function fn_amp_checked(amp_checked)
      {
      if(amp_checked)
      {
        for(i=0; i<=markers.length; i++){
          if(markers[i] && markers[i].options.tags.indexOf("Amphibians")> -1){
            map.removeLayer(markers[i]);
          }
        }
      }
      else
      {
        for(i=0; i<=markers.length; i++){
          if(markers[i] && markers[i].options.tags.indexOf("Amphibians")> -1){
            map.addLayer(markers[i]);
          }
        }
      }
      }
        function fn_coral_checked(coral_checked)
      {
      if(coral_checked)
      {
        for(i=0; i<=markers.length; i++){
          if(markers[i] && markers[i].options.tags.indexOf("Birds")> -1){
            map.removeLayer(markers[i]);
          }
        }
      }
      else
      {
        for(i=0; i<=markers.length; i++){
          if(markers[i] && markers[i].options.tags.indexOf("Birds")> -1){
            map.addLayer(markers[i]);
          }
        }
      }
      }
    </script>
</body>
</html>
