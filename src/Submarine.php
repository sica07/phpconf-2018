<?php

class Submarine extends Ship
{
    public function __construct(Coordinates $position, int $orientation)
    {
        $this->setNrOfHoles(3);
        $this->setPosition($position, $orientation);
    }
}
