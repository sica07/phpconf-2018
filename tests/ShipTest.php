<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ShipTest extends TestCase
{
    public function testWeHaveAValidDestroyer()
    {
        $holes  = 2;
        $position = new Coordinates('A', 1);
        $ship = new Destroyer($position, Game::HORIZONTAL);

        $this->assertEquals($holes, $ship->getNrOfHoles());
    }

    public function testWeHaveAValidSubmarine()
    {
        $holes  = 3;
        $position = new Coordinates('B', 1);
        $ship = new Submarine($position, Game::HORIZONTAL);

        $this->assertEquals($holes, $ship->getNrOfHoles());
    }

    public function testWeHaveAValidCruiser()
    {
        $holes  = 3;
        $position = new Coordinates('C', 1);
        $ship = new Cruiser($position, Game::HORIZONTAL);

        $this->assertEquals($holes, $ship->getNrOfHoles());
    }

    public function testWeHaveAValidBattleShip()
    {
        $holes  = 4;
        $position = new Coordinates('D', 1);
        $ship = new Battleship($position, Game::HORIZONTAL);

        $this->assertEquals($holes, $ship->getNrOfHoles());
    }

    public function testWeHaveAValidCarrier()
    {
        $holes  = 5;
        $position = new Coordinates('E', 1);
        $ship = new Carrier($position, Game::HORIZONTAL);

        $this->assertEquals($holes, $ship->getNrOfHoles());
    }

    public function testGetNumberOfHitsShouldSucceed()
    {
        $position = new Coordinates('A', 1);
        $ship = new Destroyer($position, Game::HORIZONTAL);

        $this->assertTrue(is_array($ship->getListOfHits()));
    }

    public function testIsAHitForHorizontalOrientationShouldReturnTrue()
    {
        $position = new Coordinates('A', 1);
        $ship = new Destroyer($position, Game::HORIZONTAL);

        $this->assertTrue($ship->isAHit('A', 2));
    }

    public function testIsAHitForVerticalOrientationShouldReturnTrue()
    {
        $position = new Coordinates('A', 1);
        $ship = new Destroyer($position, Game::VERTICAL);

        $this->assertTrue($ship->isAHit('B', 1));
    }

    public function testIsAHitShouldReturnFalse()
    {
        $position = new Coordinates('A', 1);
        $ship = new Destroyer($position, Game::HORIZONTAL);

        $this->assertFalse($ship->isAHit('A',3));
    }

    public function testIsSinkedShouldReturnFalse()
    {
        $position = new Coordinates('A', 1);
        $ship = new Destroyer($position, Game::HORIZONTAL);

        $this->assertFalse($ship->isSinked());
    }

    public function testIsSinkedShouldReturnTrue()
    {
        $position = new Coordinates('A', 1);
        $ship = new Destroyer($position, Game::HORIZONTAL);
        $ship->isAHit('A', 1);
        $ship->isAHit('A', 3);
        $ship->isAHit('A', 2);

        $this->assertTrue($ship->isSinked());
    }

    public function testLocationExistOutsideOfShipShouldReturnFalse()
    {
        $position = new Coordinates('A', 2);
        $ship = new Submarine($position, Game::VERTICAL);

        $this->assertFalse($ship->locationExist('D', 2));

        $position = new Coordinates('A', 4);
        $ship = new Battleship($position, Game::HORIZONTAL);

        $this->assertFalse($ship->locationExist('A', 8));
    }

    public function testLocationExistInsideOfShipShouldReturnTrue()
    {
        $position = new Coordinates('C', 3);
        $ship = new Carrier($position, Game::VERTICAL);

        $this->assertTrue($ship->locationExist('E', 3));

        $position = new Coordinates('F', 6);
        $ship = new Submarine($position, Game::HORIZONTAL);

        $this->assertTrue($ship->locationExist('F', 8));

    }
}
