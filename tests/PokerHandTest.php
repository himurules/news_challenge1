<?php

namespace TDD\Test;
require_once dirname(dirname(__FILE__))
    . DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\PokerHand;

/**
 * Class PokerHandTest
 *
 * @package TDD\Test
 */
class PokerHandTest extends TestCase
{
    private $_pokerHand;

    public function setUp(): void
    {
        $this->_pokerHand = new PokerHand();
    }

    /**
     * Check if the function returns an array of 5
     */
    public function testRandomHands()
    {
        $hands = $this->_pokerHand->getRandomHand();
        $this->assertCount(5, $hands, 'Array should be having 5 elements!');
        $this->assertIsArray($hands, 'Return type should be an array');
    }

    /**
     * @dataProvider provideHandsData
     * @param        $input    array
     * @param        $expected boolean
     */
    public function testStraight($input, $expected)
    {
        $output = $this->_pokerHand->checkStraight($input);
        $this->assertEquals($output, $expected, 'This is not a straight hand, must be in sequence!');
    }

    /**
     * Return data to test
     *
     * @return array
     */
    public function provideHandsData()
    {
        return [
                [['ac','10d','kd','js','qs'], true],
                [['3c','10d','kd','js','qs'], false],
                [['ac','3d','4d','5s','2s'], true],
                [['4c','3d','4d','5s','2s'], false],
                [['10c','8d','jd','9s','qs'], true],
        ];
    }

    public function tearDown(): void
    {
        unset($this->_pokerHand);
    }
}
