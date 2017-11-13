<?php
/*
	Date: 13/11/2017
	Author: Maurice Keightley
	Purpose: Find all the points within a given circleon the grid
	Methods:checkPoints
	Parameters:
		-Grid Size (Example: 1000)
		-Circle Diameter (Example: 900)
		-Number of points (Example: 100)
		-Number of Iterations (Example: 10)
	Assumptions:
		-0 minimum grid value
*/

class CheckCircleRadius{

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

}

?>


