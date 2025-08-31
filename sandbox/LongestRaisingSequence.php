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
