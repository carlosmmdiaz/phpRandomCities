<h1>Cities</h1>
<?php 

    require_once("randomCities/randomCities.php");

    $time_start = microtime(true);

    $randomCities = new RandomCities();

    $randomCities->getRandomCities("assets/US_Cities.txt");

    $time_end = microtime(true);

    $time = ($time_end - $time_start)*1000;

    echo "Time $time miliseconds\n";
    
?>

