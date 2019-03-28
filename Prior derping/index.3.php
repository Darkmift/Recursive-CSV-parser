<?php

$csv_file = fopen('array.csv', 'r');

$parsed_csv = array();

while (!feof($csv_file)) {
    $csv_entry = fgetcsv($csv_file);
    $parent_id = $csv_entry[1];
    if (!array_key_exists($parent_id, $parsed_csv)) {
        $parsed_csv[$parent_id] = array();
        $csv_entry[0][0] = $csv_entry[2];
        array_push($parsed_csv[$parent_id], $csv_entry[0]);
    } else {
        // array_push($parsed_csv[$parent_id], $csv_entry[0]);
        // $parsed_csv[$parent_id][$csv_entry[0]]=$csv_entry[2];
    }
}

prettyPrintR($parsed_csv);
fclose($csv_file);

function prettyPrintR($param)
{
    print("<pre>" . print_r($param, true) . "</pre><hr>");
}
