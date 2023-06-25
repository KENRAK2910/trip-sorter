<?php
namespace Kenny\TripSorter\Sorter;

class ArraySorter implements Sortable
{
    private $sorterdBoardingCardsArray = [];

    public function sort($unsortedBoardingCardsArray = [])
    {
        foreach($unsortedBoardingCardsArray as $singleCard)
        {
            $newArray[] = array_change_key_case($singleCard, CASE_LOWER);
        }

        $unsortedBoardingCardsArray = $newArray;

        $arrivals = [];

        foreach($unsortedBoardingCardsArray as $k => $singleCard)
        {
            $arrivals[] = $singleCard['arrival'];
        }


        $firstCard = null;
        foreach($unsortedBoardingCardsArray as $k => $singleCard)
        {
            if(!in_array($singleCard['departure'], $arrivals))
            {
                $firstCard = $singleCard;
                unset($unsortedBoardingCardsArray[$k]);
                break;
            }
        }

        $this->sorterdBoardingCardsArray[] = $firstCard;

        do {
            foreach($unsortedBoardingCardsArray as $k => $singleCard)
            {
                if( $this->sorterdBoardingCardsArray[ count($this->sorterdBoardingCardsArray) - 1 ]['arrival'] == $singleCard['departure'])
                {
                    $this->sorterdBoardingCardsArray[] = $singleCard;
                    unset($unsortedBoardingCardsArray[$k]);
                }
            }
        } while ( !empty($unsortedBoardingCardsArray) );

        return $this->sorterdBoardingCardsArray;
    }
}