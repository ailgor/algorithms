<?php

use Ailgor\Algorithms\NeuronalNetwork\Perceptron;
 
class PerceptronTest extends PHPUnit_Framework_TestCase
{
 
  public function testAND()
  {
  	$weight = [1, 1];
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

  	$perceptron = new Perceptron();
  	$perceptron->weight($weight);
  	$accuracy = $perceptron->train($trainingData, $testData);
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
