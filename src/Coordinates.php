<?php

class Coordinates
{
    private $x = 0;
    private $y = 0;

    public function __construct(string $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;

    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }


    public function isInsideBoard()
    {
        if((isset(Game::LETTER_TO_NUMBER[$this->x]) && Game::LETTER_TO_NUMBER[$this->x] <= GAME::BOARD_HEIGHT)
            && $this->y <= GAME::BOARD_WIDTH) {
            return true;
        }

        return false;
    }

}
