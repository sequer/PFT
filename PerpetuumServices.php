<?php

namespace Perpetuum\Services;

class CsvParser
{
	private $delimiter = ',';
	private $enclosure = '"';
	private $escape = "\\";
	
	public $csv = array();
	
	public function load($filename, $removeFirstRow = true)
	{
		$this->csv = $this->parse($filename);
		if ($removeFirstRow) unset($this->csv[0]);
		return $this;
	}
	
	private function parse($filename)
	{
		return array_map('str_getcsv', file($filename));
	}
	
	public function sort($key)
	{
		usort($this->csv, $this->usort_callable($key));
		return $this;
	}
	
	private function usort_callable($key)
	{
		return function ($a, $b) use ($key) {
			return strnatcmp($a[$key], $b[$key]);
		};
	}
	
	public function toArray()
	{
		return $this->csv;
	}
}