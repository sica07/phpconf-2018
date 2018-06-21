<?php

class Battleship extends Ship
{
    public function __construct(Coordinates $position, int $orientation)
    {
        $this->setPosition($position, $orientation);
        $this->setNrOfHoles(4);
    }
}
