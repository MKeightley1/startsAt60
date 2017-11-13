<?php
/*
 - get all points
 - understand question
	*diameter of 900 in center of grid - with 450 as radius each way.
	*plot points 500,500 is center of grid
	*after reading doc about Euclidean_distance and considering triangular methods
	need to figure out how to check if plot points are in range of circle.

	Example Plot Points Calculations - if lined with center of grid
	Plot point 1: 34,78
	Plot point 2: 98,107
	
	Using right angle triagle maths
	C^2 = a^2 + b^2 squared
	
	Note: google pow function for php

*/



class CheckCircleRadius{

	function checkPoints($plotPoints){
		$plots_in_circle=0;
		$plots_out_circle=0;
		foreach($plotPoints as $plotPoint){
			//get x diff from circle center- assuming circle center grid = 500,500
			$x_distance = CENTER_GRID-$plotPoint[0];
			$y_distance = CENTER_GRID-$plotPoint[1];
			
			//ensure all distances from grid center is > 0
			if($x_distance<0){
				$x_distance= abs($x_distance);
			}
			if($y_distance<0){
				$y_distance= abs($y_distance);
			}
			
			$grid_distance = sqrt(pow($x_distance,2)+pow($y_distance,2));
			//check how many are in circle
			if($grid_distance<=RADIUS){
				$plots_in_circle++;
			}
		}
		
		return $plots_in_circle;
	}

}

?>


