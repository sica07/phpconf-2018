<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testShotShouldMisses()
    {
        $position1 = new Coordinates('A', 1);
        $position2 = new Coordinates('B', 1);
        $ship1 = new Destroyer($position1, Game::HORIZONTAL);
        $ship2 = new Destroyer($position2, Game::HORIZONTAL);
        $game = new Game([$ship1, $ship2]);
        $hit = $game->shootAt('A', 3);

        $this->assertFalse($hit);
    }

    public function testShotShouldHit()
    {
        $position = new Coordinates('A', 1);
        $ship = new Destroyer($position, Game::HORIZONTAL);
        $game = new Game([$ship]);
        $hit = $game->shootAt('A', 1);

        $this->assertEquals(get_class($hit), get_class($ship));
    }

    public function testIsVictoryShouldReturnTrue()
    {
        $shipMock = $this->getMockBuilder(Ship::class)
                         ->setMethods(['isSinked'])
                         ->getMock();
        $shipMock->expects($this->exactly(5))
                 ->method('isSinked')
                 ->will($this->returnValue(true));

        $game = new Game([$shipMock, $shipMock, $shipMock, $shipMock, $shipMock]);

        $victory = $game->isVictory();
        $this->assertTrue($victory);
    }

    public function testIsVictoryShouldReturnFailed()
    {
        $sinkedShipMock = $this->getMockBuilder(Ship::class)
                         ->setMethods(['isSinked'])
                         ->getMock();
        $sinkedShipMock->expects($this->exactly(2))
                 ->method('isSinked')
                 ->will($this->returnValue(true));

        $shipMock = $this->getMockBuilder(Ship::class)
                         ->setMethods(['isSinked'])
                         ->getMock();
        $shipMock->expects($this->exactly(3))
                 ->method('isSinked')
                 ->will($this->returnValue(false));


        $game = new Game([$sinkedShipMock, $sinkedShipMock, $shipMock, $shipMock, $shipMock]);

        $victory = $game->isVictory();
        $this->assertFalse($victory);
    }
}
