<?php
namespace Libs;

//This call is responsible for manipulation with inputs. Such as find start of the route, connected boarding passes and create route from it. 
class Sorter
{
    public $numberOfBoardingPasses;
    public $firstBoardingPass;
    public $departures = array();
    public $arrivals = array();
    public $data;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    public $RouteKeys = array();

    /**
     * @return mixed
     */
    public function getNumberOfBoardingPasses()
    {
        return $this->numberOfBoardingPasses;
    }

    /**
     * @param mixed $numberOfBoardingPasses
     */
    public function setNumberOfBoardingPasses($numberOfBoardingPasses)
    {
        $this->numberOfBoardingPasses = $numberOfBoardingPasses;
    }

    /**
     * @return mixed
     */
    public function getFirstBoardingPass()
    {
        return $this->firstBoardingPass;
    }

    /**
     * @param mixed $firstBoardingPass
     * @return Sorter
     */
    public function setFirstBoardingPass($firstBoardingPass)
    {
        $this->firstBoardingPass = $firstBoardingPass;
        return $this;
    }

    /**
     * @return array
     */
    public function getDepartures()
    {
        return $this->departures;
    }

    /**
     * @param array $departures
     * @return Sorter
     */
    public function setDepartures($departures)
    {
        $this->departures = $departures;
        return $this;
    }

    /**
     * @return array
     */
    public function getArrivals()
    {
        return $this->arrivals;
    }

    /**
     * @param array $arrivals
     * @return Sorter
     */
    public function setArrivals($arrivals)
    {
        $this->arrivals = $arrivals;
        return $this;
    }

    /**
     * @return array
     */
    public function getRouteKeys()
    {
        return $this->getRouteKeys();
    }

    /**
     * @param array $RouteKeys
     * @return Sorter
     */
    public function setRouteKeys($routeKeys)
    {
        $this->routeKeys = $routeKeys;
        return $this;
    }
}