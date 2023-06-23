<?php
namespace Kenny\TripSorter\Transportation;

use Kenny\TripSorter\Transportation\Modes\AirTransport;

class Plane extends AirTransport
{
    private $arrival = '';
    private $departure = '';
    private $seatNumber = '';
    private $gateNumber = '';
    private $baggageCounter = '';
    private $transportationNumber = '';


    const GUIDE_MSG = 'From %s, take flight %s to %s.';
    const GATE_SEAT_MSG = ' Gate %s, Seat %s.';
    const BAGGAGE_MSG = ' Baggage drop at ticket counter %s.';
    const DEF_BAGGAGE_MSG = ' Baggage will be automatically transferred from your last leg.';

    public function __construct($boardingCard = [])
    {
        $this->arrival = $boardingCard['arrival'];
        $this->departure = $boardingCard['departure'];
        $this->seatNumber = $boardingCard['seat'];
        $this->gateNumber = $boardingCard['gate'];
        $this->baggageCounter = isset($boardingCard['baggage']) ? $boardingCard['baggage'] : '';
        $this->transportationNumber = $boardingCard['transportationnumber'];
    }

    public function guideMessage()
    {
        $message = sprintf(self::GUIDE_MSG, $this->departure, $this->transportationNumber, $this->arrival);
        $message .= sprintf(self::GATE_SEAT_MSG, $this->gateNumber, $this->seatNumber);

        if( $this->baggageCounter > '' )
            $message .= sprintf(self::BAGGAGE_MSG, $this->baggageCounter);
        else
            $message .= sprintf(self::DEF_BAGGAGE_MSG);

        echo $message."\n";
    }
}