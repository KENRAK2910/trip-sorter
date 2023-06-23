<?php
namespace Kenny\TripSorter;

use Kenny\TripSorter\Sorter\Sortable;
use Kenny\TripSorter\Exception\InvalidTransportationTypeException;
use Kenny\TripSorter\Transportation\Modes\AbstractTransport;

class TripSorter{

    private $sorter = null;
    private $boardingCardsReader = null;
    private $sortedBoarindgCardsArray = [];
    private $unsortedBoardingCardsArray = [];

    public function __construct($boardingCardsReader, Sortable $sortableInstance)
    {
        $this->sorter = $sortableInstance;
        $this->boardingCardsReader = $boardingCardsReader;
    }

    public function run()
    {
        $this->unsortedBoardingCardsArray = $this->boardingCardsReader->init()->readGetData();

        $this->sortedBoarindgCardsArray = $this->sorter->sort($this->unsortedBoardingCardsArray);

        $this->showTripGuide();
    }

    public function showTripGuide()
    {
        if( count($this->sortedBoarindgCardsArray) < 1 )
        {
            echo 'No boarding cards found. Exiting...';
            exit;
        }

        foreach($this->sortedBoarindgCardsArray as $k => $boardingCard)
        {
            $transportationType = 'Kenny\TripSorter\Transportation\\' . $boardingCard['transportation'];

            $instance = new $transportationType( $boardingCard );

            if( ! $instance instanceof AbstractTransport )
                throw new InvalidTransportationTypeException($boardingCard['transportation'] . ' is an invalid Transportation type. Please check and try again.', 1);

            $instance->guideMessage();
        }
        echo 'You have reached your destination.';
    }
}