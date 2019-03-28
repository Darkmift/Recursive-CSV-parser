<?php

$csv_file = fopen('array.csv', 'r');
// $csv_parsed =str_getcsv($csv_file, "\n");
// $csv_parsed = array_map('str_getcsv', $csv_file);
// prettyPrintR($csv_parsed);
// die();
while (!feof($csv_file)) {
    prettyPrintR(fgetcsv($csv_file));
}

fclose($csv_file);

/*
function buildTree(array $elements, $parentId = 0)
{
$branch = array();

foreach ($elements as $element) {
if ($element[1] == $parentId) {
$children = buildTree($elements, $element[0]);
if ($children) {
$element[1] = $children;
}
$branch[] = $element;
}
}

return $branch;
}

// $tree = buildTree($MyArray);*/

function prettyPrintR($param)
{
    print("<pre>" . print_r($param, true) . "</pre><hr>");
}
