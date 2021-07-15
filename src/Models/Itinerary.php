<?php

namespace ItinerarySorter\Models;

class Itinerary {
    
    public static function findItinerary($tickets) {
        return Itinerary::orderTickets($tickets);
    }

    private static function orderTickets($tickets)
    {
        $orderedTickets = [];
        $startingPoint;
        $nextTicket;
        
        foreach($tickets as $ticket) {
            if (!array_key_exists($ticket->getArrival(), $tickets)) {
                $startingPoint = $ticket;
                array_push($orderedTickets, $startingPoint);
                break;
            }
        }
        $nextTicket = $startingPoint;
        while(count($orderedTickets) != count($tickets)) {
            if($nextTicket) {
                foreach($tickets as $ticket) {
                    if ($ticket->getDeparture() == $nextTicket->getArrival()) {
                        array_push($orderedTickets, $ticket);
                        $nextTicket = $ticket;
                        break;
                    }
                }
            }
        }
        return $orderedTickets;
    }

}
