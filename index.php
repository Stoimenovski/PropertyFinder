<?php

require __DIR__ . '/vendor/autoload.php';


use PropertyFinder\TripSorter\Bus;
use PropertyFinder\TripSorter\Train;
use PropertyFinder\TripSorter\BoardingCard;

$p = new BoardingCard('Skopje', 'Sofia', 'train', ['test' => 123]);
$b1 = new Bus('Skopje', 'Sofia', 'bus', 54, ['bus_number' => '119A']);
$t1 = new Train('Skopje', 'Sofia', 'train', '', ['train_number' => 14,'train_description' => 'Train Description']);
$b3 = new Bus('Skopje', 'Sofia', 'train', 436, []);

echo '<pre>';
print_r($b1->description());
echo "\n";
print_r($t1->description());
echo '</pre>';
exit;