<?php

namespace PropertyFinder\TripSorter;

use PropertyFinder\TripSorter\BoardingCard;

/**
 * Bus class. Contain methods related to bus type of transportation.
 *
 * @author Stoimenovski Stojan
 */
class Bus extends BoardingCard
{
    /**
     * Return details about bus, such as bus number or description about bus.
     * @return mixed
     */
    public function getBus()
    {
        $bus = json_decode($this->tripDetails);
        
        return isset($bus->bus_number) ? 'bus '.$bus->bus_number :
               ( isset($bus->bus_description) ? $bus->bus_description : null);
    }
    
    /**
     * Description (guidelines) for trip.
     * Return string if all conditions are met or NULL if something went wrong
     * @return mixed
     */
    public function description()
    {
        $desc = '';
        
        if($this->getBus())
        {
            $desc .= 'Take '.$this->getBus().' from '. $this->getFrom(). ' to '.$this->getTo().'. ';
            $this->getSeatNumber() ? $desc.= 'Sit in seat No.'. $this->getSeatNumber().'. ' : $desc.= 'No seat assignment. ';
            
            return  $desc;
        }
        else
            return NULL;
    }
}
