<?php
/*
	Date: 13/11/2017
	Author: Maurice Keightley
	Purpose: Replicate the Monte Carlo simulation
	Parameters:
		-Grid Size (Example: 1000)
		-Circle Diameter (Example: 900)
		-Number of points (Example: 100)
		-Number of Iterations (Example: 10)
	Assumptions:
		-0 minimum grid value
*/

include 'randomPlotPoints.php';
include 'checkCircleRadius.php';

	
	//get command input
	foreach($argv as $key => $value){
		if($key=="gridSize"){
			$gridSize=$value;
		}elseif($key=="circleDiameter"){
			$circleDiameter=$value;
		}elseif($key=="n"){
			$n=$value;
		}elseif($key=="iterations"){
			$iterations=$value;
		}elseif($key=="test"){
			$test=$value;
		}
	};
	if($test){
		//test input
		$test = simulation(1000,900,100,10);
	}else if(count($argv)==4){
		simulation($gridSize,$circleDiameter,$n,$iterations);
	}else{
		print_r("Not enough arguments given.");
	}
	
	
	

	//similute Monte Carlo simulation
	function simulation($gridSize,$circleDiameter,$n,$iterations){
		$total_pi = 0;
		$total_iterations=$iterations;
		while($iterations>0){
			//generate all 100 points on graph
			$RandomPlotPoints = new RandomPlotPoints();
			$plotPoints = $RandomPlotPoints->generatePoints($gridSize,$n);
			
			//get all points within circle
			$CheckCircleRadius = new CheckCircleRadius();
			$plotsWithinCircle = $CheckCircleRadius->checkPoints($gridSize,$plotPoints,$circleDiameter);
			
			//get percentage 
			$plotsWithinCirclePercentage = $plotsWithinCircle/$n;
			
			//calculate area of circle
			$estimated_circle_area = $plotsWithinCirclePercentage*pow($gridSize,2);
			
			//calculate radius
			$radius= ($circleDiameter/2);
			$pi=$estimated_circle_area/$radius/$radius;
			
			//tally the pis
			$total_pi+= $pi;
			
			$iterations--;
		}
		print_r("AVG PI:$total_pi/$total_iterations");
	}

?>


