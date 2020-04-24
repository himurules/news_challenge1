<?php

namespace TDD;

/**
 * Class PokerHand
 *
 * @package TDD
 */
class PokerHand
{

    /**
     * Card rank array
     *
     * @var array
     */
    private $_r = [
        'a'=>14,
        '2'=>2,
        '3'=>3,
        '4'=>4,
        '5'=>5,
        '6'=>6,
        '7'=>7,
        '8'=>8,
        '9'=>9,
        '10'=>10,
        'j'=>11,
        'q'=>12,
        'k'=>13
    ];
    /**
     *  Cards suit array
     *
     * @var array
     */
    private $_suit = ['c','d','h','s'];

    /**
     * Get an array of 5 random hands
     *
     * @return array
     */
    public function getRandomHand()
    {
        $hand = [];
        for ($i=0;$i<5;$i++) {
            $hand[] = array_search(
                $this->_r[
                array_rand($this->_r, 1)
                ], $this->_r
            ).
            $this->_suit[
                array_rand($this->_suit, 1)
            ];
        }
        return $hand;
    }

    /**
     * Check if the cards in the given hand contains straight
     *
     * @param array $h set to hand to evaluate
     *
     * @return bool
     */
    public function checkStraight(array $h)
    {
        $c = array_map(function($v){return $this->_r[(strlen($v) == 3 ? 10 : $v[0])];}, $h);
        sort($c);
        return ([2,3,4,5,14] === $c) ?
            1 : ($c == range($c[0], $c[4]) ?
                1 : 0);
    }
}
