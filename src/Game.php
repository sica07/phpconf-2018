<?php

class Game
{
    private $ships;
    const HORIZONTAL = 1;
    const VERTICAL = 2;
    const BOARD_WIDTH = 8;
    const BOARD_HEIGHT = 7;
    const LETTER_TO_NUMBER = ['A' => 1, 'B' => 2, 'C' => 3, 'D' => 4, 'E' => 5, 'F' => 6 , 'G' => 7];

    public function __construct(array $ships = [])
    {
        $this->ships = $ships;
    }

    public function shootAt($x, $y)
    {
        foreach ($this->ships as $ship) {
            if ($ship->isAHit($x, $y)) {
                return $ship;
            }
        }

        return false;
    }

    public function isVictory()
    {
        $sinkedShips = 0;
        foreach ($this->ships as $ship) {
            if($ship->isSinked()) {
                $sinkedShips ++;
            }
        }

        return (count($this->ships) === $sinkedShips);
    }

}
