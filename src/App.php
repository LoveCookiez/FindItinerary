<?php
namespace ItinerarySorter;
use ItinerarySorter\Models\Itinerary;
use ItinerarySorter\Models\Ticket;

class App {
    public static function init($tickets) {
        App::sortTickets($tickets);
    }

    private static function sortTickets($json)
    {   
        try{
            $tickets = [];
            $data = json_decode($json);
            foreach($data as $ticket) {
                array_push($tickets, new Ticket($ticket));
            }
            Itinerary::findItinerary($tickets);
        }
        catch(Exception $e)
        {
            print_r($e->getMessage());
        }
    }
}
