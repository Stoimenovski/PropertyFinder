<?php

namespace PropertyFinder\TripSorter;

use PropertyFinder\TripSorter\BoardingCard;
/**
 * Description of Bus
 *
 * @author Stoimenovski Stojan
 */
class Bus extends BoardingCard
{
    public function getBus()
    {
        $bus = json_decode($this->tripDetails);
        
        return isset($bus->bus_number) ? 'bus '.$bus->bus_number :
               ( isset($bus->bus_description) ? $bus->bus_description : null);
    }
    
    public function description()
    {
        $desc = '';
        
        if($this->getBus())
        {
            $desc .= 'Take '.$this->getBus().' from '. $this->getFrom(). ' to '.$this->getTo().'. ';
            $this->getSeatNumber() ? $desc.= 'Sit in seat No.'. $this->getSeatNumber().'. ' : $desc.= 'No seat assignment.';
            
            return  $desc;
        }
        else
            return NULL;
    }
}
