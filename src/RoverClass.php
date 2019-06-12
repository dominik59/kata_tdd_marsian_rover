<?php
/**
 * Class for Rover class operation.
 */
namespace App;

/**
 * Class RoverClass.
 *
 * @package App
 */
class RoverClass
{
    private $xCoordinate;
    private $yCoordinate;
    private $direction;

    /**
     * RoverClass constructor.
     */
    public function __construct(int $xCoordinate, int $yCoordinate, string $direction)
    {
        $this->xCoordinate = $xCoordinate;
        $this->yCoordinate = $yCoordinate;
        $this->direction = $direction;
    }

    public function getCoordinates()
    {
        return ['x' => $this->xCoordinate, 'y' => $this->yCoordinate];
    }

    public function getDirection()
    {
        return $this->direction;
    }
}