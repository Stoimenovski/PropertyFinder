<?php

namespace PropertyFinder\TripSorter;

use PropertyFinder\TripSorter\BoardingCard;

/**
 * Airplane class. Contain methods related to air type of transportation.
 *
 * @author Stoimenovski Stojan
 */
class Airplane extends BoardingCard
{
   /**
    * Return details about flight. 
    * @return object
    */
    public function getFlightDetails()
    {
        return json_decode($this->tripDetails);
    }
       
    /**
     * Return flight number.
     * @return mixed
     */
    public function getFlight()
    {
        if(isset($this->getFlightDetails()->flight_number))
            return $this->getFlightDetails()->flight_number;
        else
            return NULL;
    }
    
    /**
     * Return gate.
     * @return mixed
     */
    public function getGate()
    {
        if(isset($this->getFlightDetails()->gate))
            return $this->getFlightDetails()->gate;
        else
            return NULL;
    }
    
    /**
     * Return information about baggage drop counter.
     * @return mixed
     */
    public function baggageDrop()
    {
        if(isset($this->getFlightDetails()->baggage_drop))
            return $this->getFlightDetails()->baggage_drop;
        else
            return NULL;
        
    }
    
    /**
     * Return information about automatic baggage transfer.
     * @return mixed
     */
    public function baggageAutoTranfer()
    {
        if(isset($this->getFlightDetails()->auto_baggage_transfer))
            return $this->getFlightDetails()->auto_baggage_transfer == true ? true : false;
        else
            return NULL;
    }
    
    /**
     * Description (guidelines) for trip.
     * Return string if all conditions are met or NULL if something went wrong
     * @return mixed
     */
    public function description()   
    {
        $desc = '';
        
        if($this->getFlight())
        {
            $desc .= 'From '.$this->getFrom().', take flight '. $this->getFlight(). ' to '.$this->getTo().'. ';

            //Show details about gate and seat number
            
            if($this->getGate() && $this->getSeatNumber())
                $desc.= 'Gate '. $this->getGate().', seat '.$this->getSeatNumber().'. ';
            elseif($this->getGate() && !$this->getSeatNumber())
                $desc.= 'Gate '. $this->getGate().', no seat assignment. ';
            elseif(!$this->getGate() && $this->getSeatNumber())
                $desc.= 'Gate information is missing, seat '.$this->getSeatNumber().'. ';
            else
                $desc.= 'Missing information about gate or seat number. ';
            
            //Baggage drop counter is defined
            if($this->baggageDrop())
                $desc .= 'Baggage drop at ticket counter '. $this->baggageDrop ().'. ';
            
            //Baggage auto transfer is defined
            if($this->baggageAutoTranfer() !== NULL && $this->baggageAutoTranfer())
                $desc .= 'Baggage will we automatically transferred from your last leg. ';
            
            return  $desc;
        }
        else
            return NULL;
        
    }
}
