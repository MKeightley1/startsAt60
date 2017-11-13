<?php
include 'randomPlotPoints.php';



$RandomPlotPoints = new RandomPlotPoints();
$plotPoints = $RandomPlotPoints->generatePoints();
print_r($plotPoints);

?>


