<?php
require "vendor/autoload.php";

use Kenny\TripSorter\Reader\BoardingCardsReader;
use Kenny\TripSorter\Sorter\ArraySorter;

$jsonFileLocation = 'data/boarding-cards.json';
$boardingCardsReader = new BoardingCardsReader('JSONFile', $jsonFileLocation);

$arraySorter = new ArraySorter();

$tripSorter = new \Kenny\TripSorter\TripSorter($boardingCardsReader, $arraySorter);

$tripSorter->run();