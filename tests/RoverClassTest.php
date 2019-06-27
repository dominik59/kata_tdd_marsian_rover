<?php
/**
 * Test for Rover class.
 */
namespace Test;

use App\RoverClass;
use PHPUnit\Framework\TestCase;

/**
 * Class RoverClassTest.
 *
 * @package Test
 */
class RoverClassTest extends TestCase
{
    /**
     * Test whether we are able to initialize rover.
     */
    public function testRoverInitializationMethodExistence()
    {
        //given
        //when
        $roverClassObject = new RoverClass(0, 0, "N");

        //then
        $this->assertSame($roverClassObject->getX(), 0);
        $this->assertSame($roverClassObject->getY(), 0);
        $this->assertSame($roverClassObject->getDirection(), 'N');
    }

    /**
     * Test whether rover can react on commands sent by array of characters.
     */
    public function testRoverCanGoForward()
    {
        //given
        $roverClassObject = new RoverClass(0, 0, "N");
        
        //when
        $roverClassObject->executeCommands(['f']);

        //then
        $this->assertSame($roverClassObject->getX(), 0);
        $this->assertSame($roverClassObject->getY(), 1);
        $this->assertSame($roverClassObject->getDirection(), 'N');
    }

    /**
     * Test whether rover can react on commands sent by array of characters.
     */
    public function testRoverCanGoBackward()
    {
        //given
        $roverClassObject = new RoverClass(0, 0, "N");

        //when
        $roverClassObject->executeCommands(['b']);

        //then
        $this->assertSame($roverClassObject->getX(), 0);
        $this->assertSame($roverClassObject->getY(), -1);
        $this->assertSame($roverClassObject->getDirection(), 'N');
    }

    /**
     * Test whether rover can react on commands sent by array of characters.
     *
     * @dataProvider dataProviderForTurningLeft
     *
     * @param string $initialDirection  Character which mean initial direction
     * @param string $expectedDirection Character which mean expected direction
     */
    public function testRoverCanTurnLeft($initialDirection, $expectedDirection)
    {
        //given
        $roverClassObject = new RoverClass(0, 0, $initialDirection);

        //when
        $roverClassObject->executeCommands(['l']);

        //then
        $this->assertSame($roverClassObject->getX(), 0);
        $this->assertSame($roverClassObject->getY(), 0);
        $this->assertSame($roverClassObject->getDirection(), $expectedDirection);
    }

    /**
     * Return generator which check whether with some initial direction and left turn order it will interprets it
     * right way.
     *
     * @return \Generator Data provider
     */
    public function dataProviderForTurningLeft()
    {
        yield [
            'initialDirection' => 'N',
            'expectedDirection' => 'W',
        ];
        yield [
            'initialDirection' => 'W',
            'expectedDirection' => 'S',
        ];
        yield [
            'initialDirection' => 'S',
            'expectedDirection' => 'E',
        ];
        yield [
            'initialDirection' => 'E',
            'expectedDirection' => 'N',
        ];
    }

    /**
     * Test whether rover can react on commands sent by array of characters.
     *
     * @dataProvider dataProviderForTurningRight
     *
     * @param string $initialDirection  Character which mean initial direction
     * @param string $expectedDirection Character which mean expected direction
     */
    public function testRoverCanTurnRight($initialDirection, $expectedDirection)
    {
        //given
        $roverClassObject = new RoverClass(0, 0, $initialDirection);

        //when
        $roverClassObject->executeCommands(['r']);

        //then
        $this->assertSame($roverClassObject->getX(), 0);
        $this->assertSame($roverClassObject->getY(), 0);
        $this->assertSame($roverClassObject->getDirection(), $expectedDirection);
    }

    /**
     * Return generator which check whether with some initial direction and right turn order it will interprets it
     * right way.
     *
     * @return \Generator Data provider
     */
    public function dataProviderForTurningRight()
    {
        yield [
            'initialDirection' => 'N',
            'expectedDirection' => 'E',
        ];
        yield [
            'initialDirection' => 'E',
            'expectedDirection' => 'S',
        ];
        yield [
            'initialDirection' => 'S',
            'expectedDirection' => 'W',
        ];
        yield [
            'initialDirection' => 'W',
            'expectedDirection' => 'N',
        ];
    }
}