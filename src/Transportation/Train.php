<?php
namespace Kenny\TripSorter\Transportation;

use Kenny\TripSorter\Transportation\Modes\RailroadTransport;

class Train extends RailroadTransport
{
    private $arrival = '';
    private $departure = '';
    private $seatNumber = '';
    private $transportationNumber = '';


    const GUIDE_MSG = 'Take train %s from %s to %s.';
    const SEAT_MSG  = 'Sit in seat %s';


    public function __construct($boardingCard = [])
    {
        $this->arrival = $boardingCard['arrival'];
        $this->departure = $boardingCard['departure'];
        $this->seatNumber = $boardingCard['seat'];
        $this->transportationNumber = $boardingCard['transportationnumber'];
    }


    public function guideMessage()
    {
        $message = sprintf(self::GUIDE_MSG, $this->transportationNumber, $this->departure, $this->arrival);
        $message .= ' ' . sprintf(self::SEAT_MSG, $this->seatNumber);

        echo $message."\n";
    }
}
