<?php
namespace Ailgor\ML\NeuronalNetwork;

class Perceptron
{

	private $weights;
	private $minError;
	private $w0;
	private $currentIteration;
	private $maxIterations;
	private $error;

	public function __construct()
	{
		$this->minError = 0.2;
		$this->w0 = 0.5;
		$this->maxIterations = 100;
	}

	public function weights($weights)
	{
		$this->weights = $weights;

		return $this;
	}

	public function minError($minError)
	{
		$this->minError = $minError;

		return $this;
	}

	public function w0($w0)
	{
		$this->w0 = $w0;

		return $this;
	}

	public function maxIterations($maxIterations)
	{
		$this->maxIterations = $maxIterations;

		return $this;
	}

	public function getWeights()
	{
		return $this->weights;
	}

	public function getAccuracy()
	{
		return (1 - $this->error) * 100;
	}

	public function getW0()
	{
		return $this->w0;
	}

	public function getNumIterations()
	{
		return $this->currentIteration;
	}

	public function train($trainingData, $testData)
	{
		$this->evolution = array();
		$this->error = 1;
		$this->currentIteration = 0;

		while ($this->error > $this->minError && $this->currentIteration < $this->maxIterations) {	
			$this->currentIteration++;
			$this->learn($trainingData);
			$this->test($testData);
		}
	}

	public function test($testData)
	{
		$total = count($testData);
		$errors = 0;

		foreach ($testData as $example) {
			$y = $this->classify($example[0]);
			if ($y != $example[1]) {
				$errors++;
			}
		}
		
		$this->error = round($errors / $total, 2);
	}

	public function learn($trainingData)
	{
		foreach ($trainingData as $example) {
			$x = $example[0];
			$d = $example[1];
			$y = $this->classify($x);
			if ($y != $d) {
				for ($i = 0; $i < count($this->weights); $i++) {
					$this->weights[$i] += round($d*$x[$i], 2);
					$w0 = $this->w0;
				}
				$this->w0 += $d;
			}
		}
	}

	public function classify($input)
	{
		$e = 0;

		for ($i = 0; $i < count($input); $i++) {
			$e += $input[$i] * $this->weights[$i] + $this->w0;
		}

		return $this->activate($e);
	}

	public function activate($e)
	{
  		if ($e < $this->w0) {
  			return -1;
  		} else {
  			return 1;
  		}
	}

}
