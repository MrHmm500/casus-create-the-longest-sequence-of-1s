<?php
$jsonTestCases = file_get_contents('testcases.json');
$testCases = json_decode($jsonTestCases);
foreach($testCases as $caseName => $caseData) {
    echo "-----------------------------------<br />";
    echo $caseName . ' wordt getest<br />';
    echo 'expected output: <br />';
    echo str_replace("\n", '<br />', str_replace(' ', '&nbsp;', $caseData->expectedOutput)) . '<br /><br />';

    $input = $caseData->input;

    echo "-----------------------------------<br />";
    echo "actual output:<br />";

    extractOutputFromInput($input);
}

function extractOutputFromInput($input)
{
    $array = explode('0', $input);
    $arraycount = count($array);
    $highestAmount = 0;
    foreach($array as $i => $group) {
        if(($i+1) != $arraycount) {
            $length = strlen($array[$i]);
            $length += strlen($array[$i+1]);
        }

        if($length > $highestAmount) {
            $highestAmount = $length;
        }
    }

    $highestAmount++;

    echo("$highestAmount<br />");
}
