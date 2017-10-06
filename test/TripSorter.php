<?php

use PHPUnit\Framework\TestCase;
use PropertyFinder\TripSorter\Bus;
use PropertyFinder\TripSorter\Train;
use PropertyFinder\TripSorter\Airplane;
use PropertyFinder\TripSorter\CardSorter;
use PropertyFinder\TripSorter\BoardingCard;

/**
 * Test for TripSorter
 *
 * @author digital
 */
class TripSorter extends TestCase
{
    public function testSorter(){
        $t  = new Train ('Madrid', 'Barcelona', 'train', '45B', ['train_number' => '78A']);
        $a1 = new Airplane ('Stockholm', 'New York JFK', 'airplane', '7B', ['gate' => '22', 'flight_number' => 'SK22', 'auto_baggage_transfer' => true]);
        $b  = new Bus ('Barcelona', 'Gerona Airport', 'bus', '', ['bus_description' => 'airport bus']);
        $a2 = new Airplane ('Gerona Airport', 'Stockholm', 'airplane', '3A', ['gate' => '45B', 'flight_number' => 'SK455', 'baggage_drop' => '344']);
        
        $sort = new CardSorter ([ $t, $a1, $b, $a2 ]);
        
        $this->assertInstanceOf ( CardSorter::class, $sort);
    }
    
    public function testTripDetails()
    {
        $t  = new Train ('Madrid', 'Barcelona', 'train', '45B', ['train_number' => '78A']);
        $a1 = new Airplane ('Stockholm', 'New York JFK', 'airplane', '7B', ['gate' => '22', 'flight_number' => 'SK22', 'auto_baggage_transfer' => true]);
        $b  = new Bus ('Barcelona', 'Gerona Airport', 'bus', '', ['bus_description' => 'airport bus']);
        $a2 = new Airplane ('Gerona Airport', 'Stockholm', 'airplane', '3A', ['gate' => '45B', 'flight_number' => 'SK455', 'baggage_drop' => '344']);
        
        $sort = new CardSorter ([ $t, $a1, $b, $a2 ]);
        
        $this->assertInstanceOf ( CardSorter::class, $sort);
        
        $this->assertEquals (
                    	       $sort->tripDetails(),
				"1) Take train 78A from Madrid to Barcelona. Sit in seat No.45B. <br>".
                                "2) Take airport bus from Barcelona to Gerona Airport. No seat assignment. <br>".
                                "3) From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A. Baggage drop at ticket counter 344. <br>". 
                                "4) From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B. Baggage will we automatically transferred from your last leg. <br>". 
                                "5) You have arrived at your final destination."
		);
    }
}

