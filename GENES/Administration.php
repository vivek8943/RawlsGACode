

		<?php

$csv = array_map('str_getcsv', file('wordlist.csv'));
fclose($file);
header('Content-Type: application/json');
echo json_encode($csv);

?>