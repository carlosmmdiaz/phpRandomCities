<?php

class RandomCities {
    private $list;

    // Reads the file:
    function read_file($filename = ''){
    
        // Open the file:
        $file = fopen($filename, "r");
        $this->list = array();

        while (!feof($file)) {
            $word = fgets($file);
            $letter = substr($word, 0, 1);

            if(!isset($this->list[$letter])) {

                $wordList = array();
                $wordList[]=$word;
                $this->list[$letter] = $wordList;

            } else {

                array_push($this->list[$letter], $word);
            }
        }
        fclose($file);
    }

    // Pick up a Random City:
    function pickupRandomCity($list) {

        $randomCityNumber = rand(0, count($list) - 1);

        return $list[$randomCityNumber];
    }

    // Shows random cities from the file:
    function getRandomCities($filename) {

        // Get cities from the file:
        readfile($filename);

        foreach ($this->list as $citiesByLetter) {
           
           echo $letter."- ".pickupRandomCity($citiesByLetter)."<br>";  
        }
    }
}