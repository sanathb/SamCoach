<?php
Class LongestRaisingSequence
{
    function findLongestSequence(array $numbers): array
    {
        if (empty($numbers)) {
            return [];
        }

        if (count($numbers) == 1) {
            return $numbers;
        }

        $longestSequence = [];
        $currentSequence = [$numbers[0]];

        for ($i=1; $i<count($numbers); $i++) {
            // If the number is greater than the last element in the current sequence,
            // add it to end of the array
            if ($numbers[$i] > end($currentSequence)) {
                $currentSequence[] = $numbers[$i];
            } else {
                if (count($currentSequence) > count($longestSequence)) {
                    $longestSequence = $currentSequence;
                }
                // Reset and start new sequence
                $currentSequence = [$numbers[$i]];
            }
        }

        // If the current sequence after exhausting all elements in the array
        // is longer or equal
        if (count($currentSequence) >= count($longestSequence)) {
            $longestSequence = $currentSequence;
        }

        return $longestSequence;
    }
}


// Tests
$testDataArr = [
    [4, 6, -3, 3, 7, 9],
    [9, 6, 4, 5, 2, 0],
    [1,2,3,4,5,6,7,8,9,10],
    [10,9,8,7,6,5,4,3,2,1],
    [7],
    [],
    [0]
];


echo "\nTesting:\n\n";
foreach ($testDataArr as $i => $testData) {
    $lrs = new LongestRaisingSequence();
    $longestSequence = $lrs->findLongestSequence($testData);
    echo "Test data: ". implode(', ', $testData) . "\n";
    echo "Longest Sequence: ". implode(", ", $longestSequence). "\n\n";
}