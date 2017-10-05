<?php

namespace PropertyFinder\TripSorter;

use PropertyFinder\TripSorter\BoardingCard;

/**
 * Description of Train
 *
 * @author Stoimenovski Stojan
 */
class Train extends BoardingCard
{
    
    public function getTrain()
    {
        $train = json_decode($this->tripDetails);
        
        return isset($train->train_number) ? 'train '.$train->train_number :
               ( isset($train->train_description) ? $train->train_description : null);
    }
    
    public function description()
    {
        $desc = '';
        
        if($this->getTrain())
        {
            $desc .= 'Take '.$this->getTrain().' from '. $this->getFrom(). ' to '.$this->getTo().'. ';
            $this->getSeatNumber() ? $desc.= 'Sit in seat No.'. $this->getSeatNumber().'. ' : $desc.= 'No seat assignment.';
            
            return  $desc;
        }
        else
            return NULL;
    }
    
}
