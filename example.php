<?php
include(__DIR__ . '/graph.class.php');

$graph = new graph();

$text = "November 2013 - Internet usage";

$stats = [
    1 => 100,   2 => 140,   3 => 80,    4 => 50,    5 => 0, 
    6 => 100,   7 => 50,    8 => 80,    9 => 160,   10 => 20,
    11 => 0,    12 => 150,  13 => 250,  14 => 100,  15 => 200,
    16 => 240,  17 => 120,  18 => 50,   19 => 150,  20 => 0,
    21 => 0,    22 => 200,  23 => 150,  24 => 180,  25 => 60,
    26 => 20,   27 => 80,   28 => 150,  29 => 200,  30 => 100,
];

header("Content-Type: image/png");

print $graph->draw($text, $stats);
