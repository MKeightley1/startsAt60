<?php

/*
	Date: 13/11/2017
	Author: Maurice Keightley
	Purpose: Generate random dots on a grid
	Parameters:
		-Grid Size (Example: 1000)
		-Circle Diameter (Example: 900)
		-Number of points (Example: 100)
		-Number of Iterations (Example: 10)
	Assumptions:
		-0 minimum grid value

*/

class RandomPlotPoints{

	function generatePoints($gridSize,$n){
		//init variables
		$newPlotPoint_x =0;
		$newPlotPoint_y = 0;
		$plotPoint_array = [];

		//how many dots we have so far?
		while(count($plotPoint_array)<$n){
			//Get x and y points
			$newPlotPoint_x = rand(0,$gridSize);
			$newPlotPoint_y = rand(0,$gridSize);
			$plot_status=false;
			
			//check array
			foreach ($plotPoint_array as $plotPoint){
				//check if plot exists
				if($plotPoint[0]==$newPlotPoint_x&&$plotPoint[1]==$newPlotPoint_y){
					//if found - ignore entry
					$plot_status=true;
				}
			}
			
			//if plot points are not found - insert them into array
			if(!$plot_status){
				array_push($plotPoint_array,[$newPlotPoint_x,$newPlotPoint_y]);
				$plotPoint_array++;	
			}
		}
		return $plotPoint_array;
	}

}


?>


