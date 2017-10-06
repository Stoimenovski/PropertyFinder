# PropertyFinder

The solution will work only in perfect scenario. That mean that we except one way trip, if there is round trip the sorter won't work. It is not stated in the task that we will have round trips.

## Board cards format

### Bus Card

```
 from - (string) Departure point,
 to - (string) Arrival point,
 type - (string) Type of transportation in this case 'bus'
 seatNumber - (string or integer) Number of seat. If seat is not assigned leave empty string ('')
 tripDetails - (array) 
      bus_number - (string or integer) Number of the bus if it is known
      bus_description - (string) Bus description if bus number is unknown
  - It's recommended to have only bus_number or bus_description in trip details
```

### Train Card

```
 from - (string) Departure point,
 to - (string) Arrival point,
 type - (string) Type of transportation in this case 'train'
 seatNumber - (string or integer) Number of seat. If seat is not assigned leave empty string ('')
 tripDetails - (array) 
      train_number - (string or integer) Number of the train if it is known
      train_description - (string) Train description if train number is unknown
  - It's recommended to have only train_number or train_description in trip details
```
### Airplane Card

```
 from - (string) Departure point,
 to - (string) Arrival point,
 type - (string) Type of transportation in this case 'airplane'
 seatNumber - (string or integer) Number of seat. If seat is not assigned leave empty string ('')
 tripDetails - (array) 
      flight_number - (string or integer) Number of the train if it is known
      gate - (string or integer) The number of the gate
      baggage_drop - (string or integer) Baggage drop counter
      auto_baggage_transfer - (boolean) Identifies is baggage auto transferred
  
```
## Installation

1. clone repository
2. run composer install command
3. run composer dump-autoload command

## Notes

1. To see the the example run index.php in browser or run **php -f index.php** from cli in root of your project
2. To run test run **vendor/phpunit/phpunit/phpunit test/TripSorter** from cli in root of your project
3. To create documentation using phpdoc run **vendor/bin/phpdoc -d ./src/TripSorter/ -t ./doc/TripSorter** from cli in root of your project. The documentation will be generated in doc/ folder in root of your project.
