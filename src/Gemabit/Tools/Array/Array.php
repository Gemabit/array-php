<?php

namespace Gemabit\Tools\Array;

class SArray
{
	protected $value = array();
	
	public function __construct(array $array = array())
	{
		$this->value = $array;
	}

	/**
	 * Returns the md5 of the array
	 * @return string
	 */
	public function __toString()
	{
		return md5($this->sortByKey()->toJson());
		//return md5($this->flaten()->toQuery());
	}
	
	/**
	 * Returns query string formated with the array values
	 * @return string
	 */
	public function toQuery()
	{
		return http_build_query($this->value);
	}
	
	/**
	 * Returns itself as an array
	 * @return array
	 */
	public function toArray()
	{
		return $this->value;
	}
	
	public function toJson()
	{
		return json_encode($this->value);
	}
	
	public function toXml()
	{
		
	}
	
	public function sortByKey()
	{
		ksort($this->value);
		return $this;
	}

	public function each($callback) {
		foreach ($this->value as $key => &$value) {
			$callback($key, $value);
		}
		return $this;
	}
}
