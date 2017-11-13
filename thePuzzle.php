<?php
/*

*/

include 'randomPlotPoints.php';
include 'checkCircleRadius.php';

define("RADIUS", 450);
define("MAX_PLOTS", 100);
define("MIN_GRID", 0);
define("MAX_GRID", 1000);
define("CENTER_GRID", 500);

function simulation(){
	
	//collect all 100 points on graph
	$RandomPlotPoints = new RandomPlotPoints();
	$plotPoints = $RandomPlotPoints->generatePoints();
	print_r("Task 1:Points on grid:".count($plotPoints));

	//get all points within circle
	$CheckCircleRadius = new CheckCircleRadius();
	$plotsWithinCircle = $CheckCircleRadius->checkPoints($plotPoints);
	print_r("<br>Task 2:Points in circle:".$plotsWithinCircle);

	//calculate percentage
	$plotsWithinCirclePercentage = $plotsWithinCircle/MAX_PLOTS*100;
	print_r("<br>Task 3: ".number_format($plotsWithinCirclePercentage,0)."%");

	//calculate area of circle
	$grid_area = ($plotsWithinCirclePercentage/100)*pow(MAX_GRID,2);
	print_r("<br>Task 4:Grid Area:$grid_area\n");

	//Area = PI * Radius * Radius
	$pi=$grid_area/RADIUS/RADIUS;
	print_r("<br>Task 5:PI:$pi\n");

	return $pi;
	
}
$counter=0;
$numberOfIterations =10;
$total_pi = 0;
while($counter<$numberOfIterations){
	$total_pi+= simulation();
	$counter++;
}
print_r($total_pi/$numberOfIterations);
	
	




?>


