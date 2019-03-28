<?php

$csv_file = fopen('array.csv', 'r');
$parsed_csv = array();

while (!feof($csv_file)) {
    $csv_entry = fgetcsv($csv_file);
    // array_push($parsed_csv, $csv_entry);
    prettyPrintR(array($csv_entry[0], $csv_entry[1], $csv_entry[2]));
}

// prettyPrintR($parsed_csv);
fclose($csv_file);

function prettyPrintR($param)
{
    print("<pre>" . print_r($param, true) . "</pre><hr>");
}
