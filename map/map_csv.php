<?php 

require($_SERVER["DOCUMENT_ROOT"] . "/common/database_functions.php");

// Open database connection for use throughout the page generation process
$con = database_connect();

$get_country == "China";

?>

<?php

$query = "SELECT `Scientific_name`
FROM `SPECIES`
LIMIT 0 , 2000";

$queryresult = mysql_query($query);
if (!$queryresult) die ("Database access failed: " . mysql_error());
$result = mysql_num_rows($queryresult);

for ($j = 0 ; $j < $result ; ++$j)

{

	$result = mysql_fetch_row($queryresult);

$style = $j;



?>


<?php echo "$result[0]"; ?><br />


<?php 
} ?>
