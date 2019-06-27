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
    /**
     * X coordinate of rover.
     *
     * @var int $xCoordinate
     */
    private $xCoordinate;

    /**
     * Y coordinate of rover.
     *
     * @var int $yCoordinate
     */
    private $yCoordinate;

    /**
     * Direction of rover.
     *
     * @var string $direction
     */
    private $direction;

    /**
     * RoverClass constructor.
     *
     * @param int    $xCoordinate X coordinate of Rover
     * @param int    $yCoordinate Y coordinate of Rover
     * @param string $direction   Initial direction of Rover (N, S, W, E)
     */
    public function __construct(int $xCoordinate, int $yCoordinate, string $direction)
    {
        $this->xCoordinate = $xCoordinate;
        $this->yCoordinate = $yCoordinate;
        $this->direction = $direction;
    }

    /**
     * Get direction of rover.
     *
     * @return string Direction of rover
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * Get X coordinate of rover.
     *
     * @return int X coordinate
     */
    public function getX()
    {
        return $this->xCoordinate;
    }

    /**
     * Get Y coordinate of rover.
     *
     * @return int Y coordinate
     */
    public function getY()
    {
        return $this->yCoordinate;
    }

    public function executeCommands(array $array)
    {
        $this->yCoordinate++;
    }
}