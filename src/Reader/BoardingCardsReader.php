<?php
namespace Kenny\TripSorter\Reader;

use Exception;
use Kenny\TripSorter\Reader\ReaderInterface;
use Kenny\TripSorter\Exception\InvalidBoardingCardReaderException;

class BoardingCardsReader
{
    const READER_TYPES = [
        'API'      => 'Kenny\TripSorter\Reader\APIReader',
        'JSONFile' => 'Kenny\TripSorter\Reader\JSONFileReader',
    ];

    protected $config;
    protected $readerType;
    protected $readerInstance;

    public function __construct($readerType, $config)
    {
        $this->config = $config;
        $this->readerType = $readerType;
    }

    public function init()
    {
        try {
            $this->makeReaderInstance();
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            die;
        }

        return $this;
    }

    public function readGetData()
    {
        return $this->readerInstance->read($this->config);
    }

    public function makeReaderInstance()
    {
        $class = self::READER_TYPES[ $this->readerType ];

        $readerInstance = new $class;

        if( ! $readerInstance instanceof ReaderInterface )
        {
            throw new InvalidBoardingCardReaderException("Class {$class} is an invalid Boarding Card Reader.");
        }

        $this->readerInstance = new $class;
    }
}