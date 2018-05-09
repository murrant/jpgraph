<?php

/**
 * JPGraph v3.6.15
 */
require_once __DIR__ . '/../../src/config.inc.php';

use Amenadiel\JpGraph\Graph;

// Setup some data to use for the contour
$data = [
    [12, 12, 10, 10],
    [10, 10, 8, 14],
    [7, 7, 13, 17],
    [4, 5, 8, 12],
    [10, 8, 7, 8]];

// create a basic graph as a container
$__width  = 300;
$__height = 300;
$graph    = new Graph\Graph($__width, $__height);
$graph->SetMargin(30, 30, 40, 30);
$graph->SetScale('intint');
$graph->SetMarginColor('white');

// Setup title of graph
$graph->title->Set('Filled contour plot');
$graph->title->SetFont(FF_VERDANA, FS_BOLD, 12);

$graph->subtitle->Set('(horizontal labels)');
$graph->subtitle->SetFont(FF_VERDANA, FS_ITALIC, 10);

// Create a new contour plot
$cp = new FilledContourPlot($data, 8);

// Use only black/and white schema
$cp->UseHighContrastColor(true, true);

// Flip visually
$cp->SetInvert();

// Fill the contours
$cp->SetFilled(true);
// Show lines in red
$cp->ShowLines(true, 'red');

// Display the labels
$cp->ShowLabels(true, false);
$cp->SetFont(FF_ARIAL, FS_BOLD, 9);
$cp->SetFontColor('white');

// And add the plot to the graph
$graph->Add($cp);

// Send it back to the client
$graph->stroke();
