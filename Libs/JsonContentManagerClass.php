<?php
namespace Libs;

//This class resposible for Json part of ContentManagerClass
class JsonContentManagerClass extends ContentManagerClass
{
    public $storage;

    /**
     * @return mixed
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * @param mixed $storage
     */
    public function setStorage($storage)
    {
        $this->storage = $storage;
    }

    public function JsonPrepareForSorting()
    {
        $this->setSource(__DIR__ . '/../Source/Input/Json/routes.json');
        $this->setInput(json_decode(file_get_contents($this->getSource())));//load our file and convert it to a string
        return $this->input;
    }

    public function ConvertSortedBack($output)
    {
        $this->setOutput(json_encode($output));
        return $this->getOutput();
    }

    public function SaveRoute()
    {
        $this->setStorage(__DIR__ . '/../Source/Output/Json/RouteJson.json');
        file_put_contents($this->storage, $this->getOutput());
    }
}