<?php
/**
 * Test for Rover class.
 */
namespace Test;

use PHPUnit\Framework\TestCase;

/**
 * Class RoverClassTest.
 *
 * @package Test
 */
class RoverClassTest extends TestCase
{
    /**
     * Test whether there is a class for Rover operation.
     */
    public function testRoverClassOperationExistence()
    {
        //given
        //when
        $roverClassObject = new RoverClass();

        //then
        $this->assertInstanceOf(RoverClass::class, $roverClassObject);
    }
}