<?php

use PHPUnit\Framework\TestCase;

require_once 'LongestRaisingSequence.php';

class LongestRaisingSequenceTest extends TestCase
{
    private $longestRaisingSequence;

    protected function setUp(): void
    {
        $this->longestRaisingSequence = new LongestRaisingSequence();
    }

    /**
     * Test with empty array
     */
    public function testEmptyArray(): void
    {
        $result = $this->longestRaisingSequence->findLongestSequence([]);
        $this->assertEquals([],$result);
    }

    /**
     * Test with array containing zeros
     */
    public function testSingleZero(): void
    {
        $result = $this->longestRaisingSequence->findLongestSequence([0]);
        $this->assertEquals([0],$result);
    }

    /**
     * Test with array containing only one number
     */
    public function testOneNumber(): void
    {
        $result = $this->longestRaisingSequence->findLongestSequence([7]);
        $this->assertEquals([7],$result);
    }

    /**
     * Test with mixed positive and negative numbers
     */
    public function testMixedNumbers(): void
    {
        $result = $this->longestRaisingSequence->findLongestSequence([4,6,-3,3,7,9]);
        $this->assertEquals([-3,3,7,9],$result);
    }

    /**
     * Test with decreasing sequence
     */
    public function testDecreasingSequence(): void
    {
        $result = $this->longestRaisingSequence->findLongestSequence([9,6,4,5,2,0]);
        $this->assertEquals([4,5],$result);
    }

    /**
     * Test with strictly increasing sequence
     */
    public function testStrictlyIncreasingSequence(): void
    {
        $result = $this->longestRaisingSequence->findLongestSequence([1,2,3,4,5,6,7,8,9,10]);
        $this->assertEquals([1,2,3,4,5,6,7,8,9,10],$result);
    }

    /**
     * Test with strictly decreasing sequence
     */
    public function testStrictlyDecreasingSequence(): void
    {
        $result = $this->longestRaisingSequence->findLongestSequence([10,9,8,7,6,5,4,3,2,1]);
        $this->assertEquals([1],$result);
    }

    /**
     * Test with duplicate numbers
     */
    public function testDuplicateNumbers(): void
    {
        $result = $this->longestRaisingSequence->findLongestSequence([1,2,2,3,4]);
        $this->assertEquals([2,3,4],$result);
    }

    /**
     * Test with multiple sequences of same length
     */
    public function testMultipleSequencesSameLength(): void
    {
        $result = $this->longestRaisingSequence->findLongestSequence([1,2,5,3,4,6]);
        $this->assertEquals([3,4,6],$result);
    }

    /**
     * Test with negative numbers only
     */
    public function testNegativeNumbers(): void
    {
        $result = $this->longestRaisingSequence->findLongestSequence([-5,-3,-1,-4,-2]);
        $this->assertEquals([-5,-3,-1],$result);
    }

    /**
     * Test with all same numbers
     */
    public function testAllSameNumbers(): void
    {
        $result = $this->longestRaisingSequence->findLongestSequence([5,5,5,5]);
        $this->assertEquals([5],$result);
    }

    /**
     * Test with two element increasing array
     */
    public function testTwoElementIncreasing(): void
    {
        $result = $this->longestRaisingSequence->findLongestSequence([1,2]);
        $this->assertEquals([1,2],$result);
    }

    /**
     * Test with two element decreasing array
     */
    public function testTwoElementDecreasing(): void
    {
        $result = $this->longestRaisingSequence->findLongestSequence([2,1]);
        $this->assertEquals([1],$result);
    }

    /**
     * Test with larger mixed array
     */
    public function testLargerMixedArray(): void
    {
        $result = $this->longestRaisingSequence->findLongestSequence([1,3,2,4,5,7,6,8,9,10]);
        $this->assertEquals([6,8,9,10],$result);
    }
}