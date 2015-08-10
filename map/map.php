

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/stdpage_v3_edge_menu.dwt.php" codeOutsideHTMLIsLocked="false" -->



<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<style>
.Map { margin-left:24px; }
</style>

<!-- InstanceBeginEditable name="doctitle" -->



<title>EDGE of Existence :: EDGE Conservation</title>

<!-- InstanceEndEditable --><!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->

<!--[if IE 6]>

<style type="text/css"> 

.home #middle_content { width:535px; }

.home #home_amp_main { margin-top:0px; }

.home #mainContent { zoom: 1; }

.home #green_long { margin-left:210px; }

.paginationstyle { margin:10px 0px 40px 0px; }

}

</style>

<![endif]-->

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.css" />
<!--[if lte IE 8]>
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.ie.css" />
<![endif]-->
<script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
<link rel="stylesheet" href="http://www.edgeofexistence.org/conservation/map_style.css" />

</head>



<body onload="if(typeof initPage=='function') initPage();" class="edgered">



<div id="container">







<div id="pagetitle">



<!-- InstanceBeginEditable name="PageTitle" -->







<!-- InstanceEndEditable -->



</div>





<div id="mainContent"> 

 

<!-- InstanceBeginEditable name="MainContent" -->



<div class="MainCol Map">


<div id="title_halfpage">

<h2>EDGE Map</h2>

</div>


<div style="padding-right:40px;">

<p><strong>The mission of the EDGE of Existence programme is to prevent the extinction of the world's most Evolutionarily Distinct and Globally Endangered (EDGE) species.</strong></p>

<p><strong><a class="red" href="/about/edge_science.php">Click here for more information on EDGE species.</a></strong></p>

</div>



<div id="edge_map"></div>

<script src="http://www.edgeofexistence.org/conservation/countries.js"></script>
<script src="http://www.edgeofexistence.org/conservation/zones.js"></script>
<script src="http://www.edgeofexistence.org/conservation/map_species.php"></script>
<script src="http://www.edgeofexistence.org/conservation/map.js"></script>

<select id="countries">
<option>Country</option>
</select>

<input id="searchfield" placeholder="Search by common name"/><button id="search">Search</button>
<div id="searchresult"></div>




</div> 


<!-- InstanceEndEditable -->
  

</div>

  

<!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->



<br class="clearfloat" />



<?php require($_SERVER['DOCUMENT_ROOT'] . "/footer.html"); ?>



<!-- End mainContent and close down page -->



</div>



</body>



<!-- InstanceEnd --></html>

