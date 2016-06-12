<?php
namespace Libs;
include 'SorterClass.php';
include 'JsonContentManagerClass.php';

//Json part of SorterClass responsibilities.
class JsonSorterClass extends Sorter
{
    public $routeKeys = array();
    public $output;

    /**
     * @return mixed
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @param mixed $output
     */
    public function setOutput($output)
    {
        $this->output = $output;
    }

    /**
     * @return array
     */
    public function getRouteKeys()
    {
        return $this->routeKeys;
    }

    /**
     * @param array $routeKeys
     */
    public function setRouteKeys($routeKeys)
    {
        $this->routeKeys = $routeKeys;
    }

    public function FindStartingPoint()
    {
        $content = new JsonContentManagerClass();
        $this->setData($content->JsonPrepareForSorting());
        $this->setNumberOfBoardingPasses(count($content->getInput()));
        for ($i = 0; $i < $this->numberOfBoardingPasses; $i++) {
            array_push($this->arrivals, $content->input[$i]->Arrival);
            array_push($this->departures, $content->input[$i]->Departure);
        }
        $difference = array_keys(array_diff($this->arrivals, $this->departures));//looking for unique value
        $this->setFirstBoardingPass($difference[0]);// key of the starting point
        return $this->firstBoardingPass;
    }

    public function FinfRelatedBoardingPasses($start, $data)
    {
        
foreach ($this->data as $key => $value)
{
    if ($this->data[$start]->Departure === $this->data[$key]->Arrival)
    {
        $this->setRouteKeys(array_merge([$start],$this->FinfRelatedBoardingPasses($key,$this->data)));
        return $this->routeKeys;
    }
}
return [$start];
    }
    
    public function CreateRoute()
    {
    foreach ($this->routeKeys as $pos){
        $this->output[]=$this->data[$pos];
    }    
        return $this->output;
    }
}