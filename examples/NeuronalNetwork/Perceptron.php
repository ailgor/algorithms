<?php

require_once('./vendor/autoload.php');

use Ailgor\Algorithms\NeuronalNetwork\Perceptron;

$weights = [1, 1];
$trainingData = [
				[[-1, -1], -1],
				[[1, -1], -1],
				[[-1, 1], -1],
				[[1, 1], 1]
			];
$testData = [
			[[-1, -1], -1],
			[[1, -1], -1],
			[[-1, 1], -1],
			[[1, 1], 1]
		];

$perceptron = (new Perceptron())
				->weights($weights)
				->w0(0.5)
				->maxIterations(10)
				->minError(0.2);
echo "---------------------------------\n";
echo "| TRAINING....\t\t\t|\n";
$perceptron->train($trainingData, $testData);
echo "| FINISH! " . $perceptron->getNumIterations() . " iterations \t\t|\n";
echo "|\tw = [";
$finalWeights = $perceptron->getWeights();
for ($i = 0; $i < count($finalWeights); $i++) {
	$w = $finalWeights[$i];
	echo $w;
	if ($i < count($finalWeights) - 1) {
		echo  ", ";	
	}	
}
echo "]\t\t|\n";
echo "|\tw0 = " . $perceptron->getW0() . "\t\t|\n";
echo "|\tAccuracy = " . $perceptron->getAccuracy() . "%\t\t|\n";
echo "---------------------------------\n";