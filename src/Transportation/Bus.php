<?php
namespace Kenny\TripSorter\Transportation;

use Kenny\TripSorter\Transportation\Modes\RoadTransport;

class Bus extends RoadTransport
{
    private $arrival = '';
    private $departure = '';
    private $seatNumber = '';

    const GUIDE_MSG = 'Take the airport bus from %s to %s.';
    const SEAT_ASSGNMENT_MSG = 'No seat assignment.';

    public function __construct($boardingCard = [])
    {
        $this->arrival = $boardingCard['arrival'];
        $this->departure = $boardingCard['departure'];
    }

    public function guideMessage()
    {
        $message = sprintf(self::GUIDE_MSG, $this->departure, $this->arrival) . self::SEAT_ASSGNMENT_MSG;

        echo $message."\n";
    }
}