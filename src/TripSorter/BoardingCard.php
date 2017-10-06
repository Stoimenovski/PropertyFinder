<?php

namespace PropertyFinder\TripSorter;

/**
 * Base Class. Contains information that are common 
 * for all types of transportation
 *
 * @author Stoimenovski Stojan
 */
class BoardingCard
{
    /**
     * Card departure point
     * @var string 
     */
    public $from;
    
    /**
     * Card arrival point
     * @var string 
     */
    public $to;
    
    /**
     * Type of transportation
     * @var string 
     */
    public $type;
    
    /**
     * Seat number.
     * Can be string or integer
     * @var mixed 
     */
    public $seatNumber;
    
    /**
     * Array of details about the trip
     * @var array 
     */
    public $tripDetails;
    
    /**
     * Return departure point of trip.
     * @return type
     */
    public function getFrom()
    {
        return $this->from;
    }
    
    /**
     * Return arrival point of trip
     * @return type
     */
    public function getTo()
    {
        return $this->to;
    }
    
    /**
     * Return seat number
     * @return type
     */
    public function getSeatNumber()
    {
        return $this->seatNumber;
    }
    
    /**
     * Return type of transportation
     * @return type
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * @param string $from
     * @param string $to
     * @param string $type
     * @param string|integer $seatNumber
     * @param array $tripDetails
     */
    public function __construct($from, $to, $type, $seatNumber, $tripDetails)
    {
        $this->from = $from;       
        $this->to   = $to;       
        $this->type = $type;       
        $this->seatNumber = $seatNumber;       
        $this->tripDetails = json_encode($tripDetails); 
    }
    
}
