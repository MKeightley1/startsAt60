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
	ERROR Handling: If input it not valid - error messages appear.
		1.Grid is too small for dimensions of circle
		2.Any number below 0
		
	Example Command: php thePuzzle.php 100 300 3 10
	Test Run Example:  php thePuzzle.php testrun
	
*/

include 'randomPlotPoints.php';
include 'checkCircleRadius.php';
	
	//get command input
	if(count($argv)==5){
		//test input parameters and check for unique conditions
		if($argv[1]>0&&$argv[2]>0&&$argv[3]>0&&$argv[4]>0){
			if($argv[1]>=$argv[2]){
				
					print_r("----Monte Carlo simulation----\n");
				simulation($argv[1],$argv[2],$argv[3],$argv[4]);
			}else{
				print_r("ERROR: Grid isnt big enough for parameters.");
			}
		}else{
			print_r("ERROR: Invalid arguments given.");
		}
	}else if($argv[1]=="testrun"){
		//test simulation
		print_r("----Running Test----\n");
		simulation(1000,900,100,10);
	}else{
		print_r("ERROR: Not enough arguments given.");
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
		print_r("The average PI is: ".number_format($total_pi/$total_iterations,2));
	}

?>


