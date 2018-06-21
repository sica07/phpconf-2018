<?php

class Destroyer extends Ship
{
    public function __construct(Coordinates $position, int $orientation)
    {
        $this->setNrOfHoles(2);
        $this->setPosition($position, $orientation);
    }
}
