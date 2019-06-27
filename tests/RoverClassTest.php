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

}