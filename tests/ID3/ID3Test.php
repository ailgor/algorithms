<?php

use Ailgor\Algorithms\ID3\ID3;
 
class ID3Test extends PHPUnit_Framework_TestCase
{
 
  public function testHello()
  {
  	$input = ['Sky', 'Temperature', 'Humidity', 'Wind'];
  	$output = ['Yes', 'No'];

	$trainingData = [
						[['Sun', 'High', 'High', 'Weak'], 'No'],
						[['Sun', 'High', 'High', 'High'], 'No'],
						[['Clouds', 'High', 'High', 'Weak'], 'Yes'],
						[['Rain', 'Soft', 'High', 'Weak'], 'Yes'],
						[['Rain', 'Low', 'Normal', 'Weak'], 'Yes'],
						[['Rain', 'Low', 'Normal', 'High'], 'No'],
						[['Clouds', 'Low', 'Normal', 'High'], 'Yes'],
						[['Sun', 'Soft', 'Hight', 'Weak'], 'No'],
						[['Sun', 'Low', 'Normal', 'Weak'], 'Yes'],
						[['Rain', 'Soft', 'Normal', 'Weak'], 'Yes'],
						[['Sun', 'Soft', 'Normal', 'High'], 'Yes'],
						[['Clouds', 'Soft', 'High', 'High'], 'Yes'],
						[['Clouds', 'High', 'Normal', 'Weak'], 'Yes'],
						[['Raing', 'Soft', 'High', 'High'], 'No'],
					];
	$testData = [
					[['Sun', 'Soft', 'Hight', 'Weak'], 'No'],
					[['Sun', 'Low', 'Normal', 'Weak'], 'Yes'],
					[['Rain', 'Soft', 'Normal', 'Weak'], 'Yes'],
					[['Sun', 'Soft', 'Normal', 'High'], 'Yes'],
					[['Clouds', 'Soft', 'High', 'High'], 'Yes'],
				];

  	$id3 = new ID3();
  	$id3->input($input);
  	$id3->output($output);
  	$accuracy = $id3->train($trainingData);  	
  	$accuracy = $id3->test($testData);
  	$dataInput = ['Clouds', 'High', 'High', 'Weak'];
  	$result = $id3->classify($dataInput);
    $this->assertEquals($result, 'Yes');
  }
 
}
