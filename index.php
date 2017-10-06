<?php

require __DIR__ . '/vendor/autoload.php';

use PropertyFinder\TripSorter\Bus;
use PropertyFinder\TripSorter\Train;
use PropertyFinder\TripSorter\Airplane;
use PropertyFinder\TripSorter\CardSorter;
use PropertyFinder\TripSorter\BoardingCard;

$t  = new Train ('Madrid', 'Barcelona', 'train', '45B', ['train_number' => '78A']);
$a1 = new Airplane ('Stockholm', 'New York JFK', 'airplane', '7B', ['gate' => '22', 'flight_number' => 'SK22', 'auto_baggage_transfer' => true]);
$b  = new Bus ('Barcelona', 'Gerona Airport', 'bus', '', ['bus_description' => 'airport bus']);
$a2 = new Airplane ('Gerona Airport', 'Stockholm', 'airplane', '3A', ['gate' => '45B', 'flight_number' => 'SK455', 'baggage_drop' => '344']);

$sort = new CardSorter ([ $t, $a1, $b, $a2 ]);
        
$sort->tripDetails();
