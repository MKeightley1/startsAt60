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
		
	Methods:
	1. simulation - run the Monte Carlo simulation with given input
	2. checkPoints - tally all grid points which are withing the circle
		

	
*/

include 'randomPlotPoints.php';
	
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
	}else if(count($argv)==2){
		if($argv[1]=="testrun"){
			//test simulation
			print_r("----Running Test----\n");
			simulation(1000,900,100,10);
		}else{
			print_r("ERROR: Not enough arguments given.");
		}
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
			$plotsWithinCircle = checkPoints($gridSize,$plotPoints,$circleDiameter);
			
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
	
	
	
	
	//Find all the points within a given circle on the grid
	function checkPoints($gridSize,$plotPoints,$circleDiameter){
		$plots_in_circle=0;
		$plots_out_circle=0;
		$grid_middle=$gridSize/2;
		foreach($plotPoints as $plotPoint){
			//find the distance from the middle of the grid
			$x_distance = $grid_middle-$plotPoint[0];
			$y_distance = $grid_middle-$plotPoint[1];
			
			//ensure all distances from grid center is > 0
			if($x_distance<0){
				$x_distance= abs($x_distance);
			}
			if($y_distance<0){
				$y_distance= abs($y_distance);
			}
			
			$grid_distance = sqrt(pow($x_distance,2)+pow($y_distance,2));
			//check how many are in circle
			if($grid_distance<=($circleDiameter/2)){
				$plots_in_circle++;
			}
		}
		
		return $plots_in_circle;
	}

?>


