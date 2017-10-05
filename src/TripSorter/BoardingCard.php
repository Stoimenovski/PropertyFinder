<?php

namespace PropertyFinder\TripSorter;

/**
 * Description of BoardingCard
 *
 * @author Stoimenovski Stojan
 */
class BoardingCard
{
    public $from;
    
    public $to;
    
    public $type;
    
    public $seatNumber;
    
    public $tripDetails;
    
    public function getFrom()
    {
        return $this->from;
    }
    
    public function getTo()
    {
        return $this->to;
    }
    
    public function getSeatNumber()
    {
        return $this->seatNumber;
    }
    
    public function getType()
    {
        return $this->type;
    }
    
    public function __construct($from, $to, $type, $seatNumber, $tripDetails)
    {
        $this->from = $from;       
        $this->to   = $to;       
        $this->type = $type;       
        $this->seatNumber = $seatNumber;       
        $this->tripDetails = json_encode($tripDetails); 
    }
    
}
