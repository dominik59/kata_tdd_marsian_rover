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


}