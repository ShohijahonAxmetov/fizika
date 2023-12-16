<?php

namespace App\Traits;

trait KnowledgeBase
{
	function speed(Length $s, Time $t)
	{
		return $s->value / $t->value;
	}
}

class Length {
	public $value = null;
	public $physicalMagnitudeId = 1;

	function __construct($value = null)
	{
		$this->value = $value;
	} 
}

class Time {
	public $value = null;
	public $physicalMagnitudeId = 3;

	function __construct($value = null)
	{
		$this->value = $value;
	} 
}

function getNotEnoughInformationMessage()
{
	return 'Not enough information';
}