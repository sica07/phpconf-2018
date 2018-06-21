<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CoordinatesTest extends TestCase
{
    public function testGetXShouldReturnValue()
    {
        $x = 'B';
        $coordinates = new Coordinates($x, 1);

        $this->assertEquals($coordinates->getX(), $x);
    }

    public function testGetYShouldReturnValue()
    {
        $x = 'B';
        $y = 1;
        $coordinates = new Coordinates($x, $y);

        $this->assertEquals($coordinates->getY(), $y);
    }

    public function testIsInsideBoardShouldReturnTrue()
    {
        $x = 'B';
        $y = 1;
        $coordinates = new Coordinates($x, $y);

        $this->assertTrue($coordinates->isInsideBoard());
    }

    public function testIsInsideBoardShouldReturnFalse()
    {
        $x = 'H';
        $y = 1;
        $coordinates = new Coordinates($x, $y);

        $this->assertFalse($coordinates->isInsideBoard());

        $x = 'A';
        $y = 9;
        $coordinates = new Coordinates($x, $y);

        $this->assertFalse($coordinates->isInsideBoard());
    }

}
