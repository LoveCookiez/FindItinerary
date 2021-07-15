<?php

require "vendor/autoload.php";

use ItinerarySorter\Models\Ticket;
use ItinerarySorter\Models\Itinerary;

class ItineraryTest extends PHPUnit_Framework_TestCase{
    
    public function setUp(){ 
       
    }
    public function tearDown(){ }

    public function testFoundItinerary()
    {
        $input =
        [["departure" =>"start", "arrival" => "San Marino", "action" =>"some action taken"],
        ["departure" =>"Romania", "arrival" => "finish", "action" =>"some action taken"],
        ["departure" => "San Marino", "arrival" => "Romania", "action" =>"some action taken"]];
        $json = json_encode($input);
        $data = json_decode($json);
        $tickets = [];
            foreach($data as $ticket) {
                array_push($tickets, new Ticket($ticket));
            }
        $ordered = Itinerary::findItinerary($tickets);
        $last = $ordered[2];
        $this->assertTrue($last->getArrival() == "finish");
    }

    public function testWrongTicketFormat()
    {
        $this->setExpectedException(Exception::class, "Tickets format is incorrect.");
        $input =
        [["from" =>"start", "arrival" => "San Marino", "action" =>"from departure take plane to arrival"],
        ["from" =>"Romania", "arrival" => "finish", "action" =>"some action taken"],
        ["from" => "San Marino", "arrival" => "Romania", "action" =>"some action taken"]];
        $json = json_encode($input);
        $data = json_decode($json);
        $tickets = [];
        foreach($data as $ticket) {
            array_push($tickets, new Ticket($ticket));
        }
    }
}