<h1>Cities</h1>
<?php 

function read_file($filename = ''){
    
    $file = fopen($filename, "r");
    $cities = array();

    while (!feof($file)) {
        $word = fgets($file);
        $letter = substr($word, 0, 1);

        if(!isset($cities[$letter])) {

            $wordList = array();
            $wordList[]=$word;
            $cities[$letter] = $wordList;

        } else {

            $cities[$letter][] = $word;
        }
      
    }

    fclose($file);

    return $cities;

}

function pickupRandomCity($list) {

    $randomCityNumber = rand(0, count($list) - 1);

    return $list[$randomCityNumber];
}

    $time_start = microtime(true);

    $cities = read_file("src/US_Cities.txt");

    foreach ($cities as $letter => $list) {
        
        echo $letter."- ".pickupRandomCity($list)."<br>";  
    } 

    $time_end = microtime(true);

    $time = ($time_end - $time_start)*1000;

    echo "Time $time miliseconds\n";
    
?>

