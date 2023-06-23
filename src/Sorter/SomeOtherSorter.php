<?php
namespace Kenny\TripSorter\Sorter;

class SomeOtherSorter implements Sortable
{
    public function __construct()
    {

    }

    public function sort($unsortedBoardingCardsArray = [])
    {
        echo 'someotherosrter';
        // return $unsortedBoardingCardsArray;
    }
}