<?php

require __DIR__ . '/vendor/autoload.php';

use PropertyFinder\TripSorter\Bus;
use PropertyFinder\TripSorter\Train;
use PropertyFinder\TripSorter\Airplane;
use PropertyFinder\TripSorter\CardSorter;
use PropertyFinder\TripSorter\BoardingCard;

$b1 = new Bus('Skopje', 'Sofia', 'bus', '54', ['bus_number' => '119A']);
$b3 = new Airplane('Belgrade', 'Zagreb', 'airplane', '', ['flight_number' => '3A', 'auto_baggage_transfer' => true ]);
$t1 = new Train('Sofia', 'Belgrade', 'train', '', ['train_number' => '14','train_description' => 'Train Description']);
$t2 = new Bus('Zagreb', 'Belgrade', 'bus', '14', ['bus_number' => '14','bus_description' => 'Train Description']);

$trip = new CardSorter([$t2,$b1, $b3, $t1]);


echo '<pre>';
print_r($trip->tripDetails());
echo '</pre>';
exit;
echo '<pre>';
print_r($b1->description());
echo "\n";
print_r($t1->description());
echo "\n";
print_r($b3->description());
echo '</pre>';
exit;