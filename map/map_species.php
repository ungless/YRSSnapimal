<?php 

require($_SERVER["DOCUMENT_ROOT"] . "/common/database_functions.php");

// Open database connection for use throughout the page generation process
$con = database_connect();

$get_country == "China";

?>

var species =

[

<?php

$query = "SELECT * FROM SPECIES WHERE Type = 'EDGE'";

$queryresult = mysql_query($query);
if (!$queryresult) die ("Database access failed: " . mysql_error());
$result = mysql_num_rows($queryresult);

for ($j = 0 ; $j < $result ; ++$j)

{

	$result = mysql_fetch_row($queryresult);

$style = $j;



?>







{

"edge_species_id" : "<?php echo "$result[0]"; ?>",

"scientific_name":"<?php echo "$result[10]"; ?>",

"edge_group": "<?php echo "$result[4]"; ?>",

"edge_rank": "<?php echo "$result[6]"; ?>",

"species_order": "<?php echo "$result[8]"; ?>",

"species_family": "<?php echo "$result[9]"; ?>",

"countries": "<?php $cleaned_result = str_replace(array("\r\n", "\n", "\r"), '', $result[22]);?><?php echo $cleaned_result; ?>",

"common_names": "<?php $cleaned_name = str_replace(array("\r\n", "\n", "\r", "\"", "/'"), '', $result[12]);?><?php echo $cleaned_name; ?>",},

<?php 
} ?>

]