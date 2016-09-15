<?php

use Ailgor\Algorithms\NeuronalNetwork\Perceptron;
 
class PerceptronTest extends PHPUnit_Framework_TestCase
{
 
  public function testAND()
  {
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
  	$perceptron->train($trainingData, $testData);
  	$dataInput = [1, 1];
  	$result = $perceptron->classify($dataInput);
  	if ($result == -1 || $result == 1) {
  		$fin = true;
  	} else {
  		$fin = false;
  	}
    $this->assertTrue($fin);
  }
 
}
