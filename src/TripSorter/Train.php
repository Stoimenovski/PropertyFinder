<?php

namespace PropertyFinder\TripSorter;

use PropertyFinder\TripSorter\BoardingCard;

/**
 * Train class. Contain methods related to train type of transportation.
 *
 * @author Stoimenovski Stojan
 */
class Train extends BoardingCard
{
    /**
     * Return details about train, such as train number or description about train.
     * @return mixed
     */
    public function getTrain()
    {
        $train = json_decode($this->tripDetails);
        
        return isset($train->train_number) ? 'train '.$train->train_number :
               ( isset($train->train_description) ? $train->train_description : null);
    }
    
    /**
     * Description (guidelines) for trip.
     * Return string if all conditions are met or NULL if something went wrong
     * @return mixed
     */
    public function description()
    {
        $desc = '';
        
        if($this->getTrain())
        {
            $desc .= 'Take '.$this->getTrain().' from '. $this->getFrom(). ' to '.$this->getTo().'. ';
            $this->getSeatNumber() ? $desc.= 'Sit in seat No.'. $this->getSeatNumber().'. ' : $desc.= 'No seat assignment. ';
            
            return  $desc;
        }
        else
            return NULL;
    }
    
}
