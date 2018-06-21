<?php

class Carrier extends Ship
{
    public function __construct(Coordinates $position, int $orientation)
    {
        $this->setNrOfHoles(5);
        $this->setPosition($position, $orientation);
    }
}
