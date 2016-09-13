<?php

namespace Ailgor\Algorithms\ID3;

class ID3
{

	private $input;
	private $output;

	public function input($input)
	{
		$this->input = $input;

		return $this;
	}

	public function output($output)
	{
		$this->output = $output;

		return $this;
	}

	public function train($data)
	{

	}

	public function test($data)
	{

	}

	public function classify($data)
	{

	}
}
