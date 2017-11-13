<?php

//start of script

$newPlotPoint_x =0;
$newPlotPoint_y = 0;
$plotPoint_array = [];

$newPlotPoint_x = getRandomNumber();
$newPlotPoint_y = getRandomNumber();

array_push($plotPoint_array,[$newPlotPoint_x,$newPlotPoint_y]);

print_r($plotPoint_array);




function getRandomNumber(){
	$firstNumber = rand(0,1000);
	return $firstNumber;
}


?>
