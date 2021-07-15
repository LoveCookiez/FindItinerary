<?php

namespace ItinerarySorter\Models;
use \Exception;
class Ticket {
    
    private $departure;

    private $arrival;

    private $action;

    private $description;

    public function __construct($data)
    {
        foreach($data as $key => $val) {
            if(property_exists(__CLASS__,$key)) {
                $this->$key = $val;
            }else {
                throw new Exception("Tickets format is incorrect.");
            }
        }
    }

    public function getDeparture()
    {
        return $this->departure;
    }

    public function setDepartuure($departure)
    {
        $this->departure = $departure;
        return $this;
    }

    public function getArrival()
    {
        return $this->arrival;
    }

    public function setArrival($arrival)
    {
        $this->arrival = $arrival;
        return $this;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
}
