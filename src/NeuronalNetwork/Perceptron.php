<?php
namespace Ailgor\Algorithms\NeuronalNetwork;

class Perceptron
{

	private $weight;
	private $thresholdError;
	private $threshold;
	private $maxIterations;
	private $error;
	private $evolution;

	public function __construct()
	{
		$this->thresholdError = 0.2;
		$this->threshold = 0.5;
		$this->maxIterations = 1;
	}

	public function weight($weight)
	{
		$this->weight = $weight;

		return $this;
	}

	public function train($trainingData, $testData)
	{
		$this->evolution = array();
		$this->error = 1;
		$iterations = 0;

		while ($this->error > $this->thresholdError && $iterations < $this->maxIterations) {
			$this->learning($trainingData);
			$this->test($testData);
			$iterations++;
			echo "\nIteration: $iterations. Error: " . $this->error . "\n";
			print_r($this->weight);
			echo "Threeshold: " . $this->threshold . "\n";
		}
	}

	public function test($testData)
	{
		$total = count($testData);
		$errors = 0;

		foreach ($testData as $example) {
			$output = $this->classify($example[0]);
			if ($output != $example[1]) {
				$errors++;
			}
		}
		
		$this->error = round($errors / $total, 2);
		$this->evolution[] = $this->error;
	}

	public function learning($trainingData)
	{
		foreach ($trainingData as $example) {
			$x = $example[0];
			$d = $example[1];
			$output = $this->classify($x);
			print_r($x);
			echo "CLASIFICADO COMO " . $output . "\n";
			if ($output != $d) {
				echo "ERROR\n";
				for ($i = 0; $i < count($this->weight); $i++) {
					$this->weight[$i] += round($d*$x[$i], 2);
					$this->threshold += $d;
					print_r($this->weight);
					echo "Threeshold: " . $this->threshold . "\n";
				}
			}
		}
	}

	public function classify($input)
	{
		$e = 0;

		for ($i = 0; $i < count($input); $i++) {
			$e += $input[$i] * $this->weight[$i] + $this->threshold;
		}

		return $this->activate($e);
	}

	public function activate($e)
	{
  		if ($e < $this->threshold) {
  			return -1;
  		} else {
  			return 1;
  		}
	}

	public function getEvolution()
	{
		return $this->evolution;
	}

}
