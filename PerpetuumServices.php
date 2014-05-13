<?php

namespace Perpetuum\Services;

class CsvParser
{
	private $delimiter = ',';
	private $enclosure = '"';
	private $escape = "\\";
	
	public $csv = array();
	
	public function load($filename)
	{
		$this->csv = $this->parse($filename);
		return $this;
	}
	
	private function parse($filename)
	{
		return array_map('str_getcsv', file($filename));
	}
	
	public function toArray()
	{
		return $this->csv;
	}
}