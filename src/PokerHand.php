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
    private $_rank = [
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
                $this->_rank[
                array_rand($this->_rank, 1)
                ], $this->_rank
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
        $c = [];
        for ($i=0; $i<count($h); $i++) {
            $ch = substr($h[$i], 0, 1);
            $c[] += strlen($h[$i]) == 3 ?
                10 : $this->_rank[$ch];
        }
        sort($c);
        return ([2,3,4,5,14] === $c) ?
            true : ($c == range($c[0], $c[4]) ?
                true : false);
    }
}
