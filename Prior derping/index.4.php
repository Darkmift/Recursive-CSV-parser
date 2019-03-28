<?php

//grab csv data;
$csv_file = file_get_contents('array.csv');
$lines = explode(PHP_EOL, $csv_file);

//parse into array of lines as arrays
$parsed_csv = array();
foreach ($lines as $line) {
    $parsed_csv[] = str_getcsv($line);
}

// prettyPrintR($parsed_csv[0][1]);

//init for recursion stuff
// $reduced_parsed_csv = array();

// prettyPrintR(
//     buildTree($parsed_csv, $reduced_parsed_csv, 0)
// );

// buildTree($parsed_csv, $reduced_parsed_csv, 0);

// prettyPrintR(count($parsed_csv));

/*** */

function buildTree(array $array, array $reduced_array, $count)
{
    $parent_id = $array[$count][1];
    // prettyPrintR($parent_id);
    if (!array_key_exists($parent_id, $reduced_array) && $parent_id != "0") {
        $reduced_array[$parent_id] = array();
        if ($count < count($array)) {
            $newcount = $count + 1;
            prettyPrintR($count);
            return buildTree($array, $reduced_array, $newcount);
        }
        return $reduced_array;
    }
}

/** */
function prettyPrintR($param)
{
    print("<pre>" . print_r($param, true) . "</pre><hr>");
}

function recursive($num)
{
    //Print out the number.
    echo $num, '<br>';
    //If the number is less or equal to 50.
    if ($num < 50) {
        //Call the function again. Increment number by one.
        return recursive($num + 1);
    }
}

//Set our start number to 1.
$startNum = 1;

//Call our recursive function.
recursive($startNum);

// prettyPrintR($startNum);
