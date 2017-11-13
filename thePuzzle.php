<?php
/*

*/


include 'randomPlotPoints.php';
include 'checkCircleRadius.php';


//collect all 100 points on graph
$RandomPlotPoints = new RandomPlotPoints();
$plotPoints = $RandomPlotPoints->generatePoints();
print_r($plotPoints);

$CheckCircleRadius = new CheckCircleRadius();
print_r($CheckCircleRadius->checkPoints($plotPoints));


?>


