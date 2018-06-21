<?php

abstract class Ship
{
    private $origin = [];
    private $holes = 0;
    private $hits = [];
    private $orientation;

    protected function setPosition(Coordinates $origin, int $orientation): void
    {
        $this->origin = $origin;
        $this->orientation = $orientation;
    }

    public function getOrigin(): array
    {
        return $this->origin;
    }

    protected function setOrigin(array $origin): void
    {
       $this->position = $position;
    }

    public function getNrOfHoles(): int
    {
        return $this->holes;
    }

    protected function setNrOfHoles(int $nrOfHoles): void
    {
        $this->holes = $nrOfHoles;
    }

    public function getListOfHits(): array
    {
        return $this->hits;
    }

    public function isAHit($x, $y)
    {
        if ($this->locationExist($x, $y)) {
            $this->hits[] = [$x, $y];
            return true;
        }

        return false;
    }

    public function isSinked(): bool
    {
        return (count($this->hits) === $this->holes);
    }

    public function locationExist($x, $y)
    {
        if($this->orientation === Game::HORIZONTAL && $this->origin->getX() === $x) {
            return ($y < $this->origin->getY() + $this->holes);
        }

        if($this->orientation === Game::VERTICAL && $this->origin->getY() === $y) {
            return (Game::LETTER_TO_NUMBER[$x] < Game::LETTER_TO_NUMBER[$this->origin->getX()] + $this->holes);
        }

        return false;
    }


}
