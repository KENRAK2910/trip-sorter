<?php
namespace Kenny\TripSorter\Reader;

class JSONFileReader implements ReaderInterface
{
    public function read($config)
    {
        $file = $config;
        $json = file_get_contents($file);

        return json_decode($json, TRUE);
    }
}