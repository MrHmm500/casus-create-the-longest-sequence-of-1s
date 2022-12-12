<?php
$jsonTestCases = file_get_contents('testcases.json');
$testCases = json_decode($jsonTestCases);
foreach ($testCases as $caseName => $caseData) {
    echo "-----------------------------------<br />";
    echo $caseName . ' wordt getest<br />';
    echo 'expected output: <br />';
    echo str_replace("\n", '<br />', str_replace(' ', '&nbsp;', $caseData->expectedOutput)) . '<br /><br />';

    $input = explode('0', $caseData->input);

    echo "-----------------------------------<br />";
    echo "actual output:<br />";

    extractOutputFromInput($input);
}

function extractOutputFromInput($input)
{
    for ($i = 1; $i < count($input); $i++) {
        $input[$i - 1] = strlen($input[$i -1]) + strlen($input[$i]);
    }
    array_pop($input);
    $answer = max($input);
    echo ++$answer . "<br /><br />";
}
