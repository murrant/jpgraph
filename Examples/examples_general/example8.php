<?php

/**
 * JPGraph v4.0.1
 */

require_once __DIR__ . '/../../src/config.inc.php';

use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;

$ydata  = [11, 3, 8, 12, 5, 1, 9, 13, 5, 7];
$y2data = [354, 200, 265, 99, 111, 91, 198, 225, 293, 251];

// Create the graph. These two calls are always required
$__width  = 350;
$__height = 200;
$graph    = new Graph\Graph($__width, $__height);
$graph->SetScale('textlog');
$graph->SetShadow();
$graph->img->SetMargin(40, 110, 20, 40);

// Show the gridlines
$graph->ygrid->Show(true, true);
$graph->xgrid->Show(true, false);

// Create the linear plot
$lineplot  = new Plot\LinePlot($ydata);
$lineplot2 = new Plot\LinePlot($y2data);

// Add the plot to the graph
$graph->Add($lineplot);

$graph->title->Set('Example 8');
$graph->xaxis->title->Set('X-title');
$graph->yaxis->title->Set('Y-title');

$graph->title->SetFont(FF_FONT1, FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1, FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1, FS_BOLD);

$lineplot->SetColor('blue');
$lineplot->SetWeight(2);

// Adjust the color of the Y axis
$graph->yaxis->SetColor('blue');

// Specifya a legend
$lineplot->SetLegend('Plot 1');

// Adjust the position of the grid box
$graph->legend->Pos(0.05, 0.5, 'right', 'center');

// Display the graph
$graph->Stroke();
