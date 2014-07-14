<?php
/**
 * immutable container
 */
namespace Ci\UtilityBundle\Container;

use Ci\UtilityBundle\Interfaces\Container;
use Doctrine\Common\Collections\ArrayCollection;
use Ci\UtilityBundle\Exceptions\Exceptions;

/**
 * implementation of container, that takes an array in its
 * constructor and sets all values of this
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Ci\UtilityBundle\Container
 * @copyright	2014, TeeAge-Beatz UG (haftungsbeschränkt)
 */
final class ImmutableContainer implements Container {
	use Exceptions;
	
	/**
	 * @var	Doctrine\Common\Collections\ArrayCollection stores the values of this container
	 */
	private $collection;
	
	/**
	 * constructor takes an array to set all values
	 * 
	 * @param	array	$array
	 */
	public function __construct(array $array) {
		$this->collection = new ArrayCollection($array);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Ci\UtilityBundle\Interfaces\Container::get()
	 * 
	 * @param	string	$key
	 */
	public function get($key) {
		return $this->has($key) ? $this->collection->get($key) : $this->_noKeyException($key);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Ci\UtilityBundle\Interfaces\Container::toArray()
	 */
	public function toArray() {
		return $this->collection->toArray();
	}
	
	/**
	 * checks if $key exists
	 * 
	 * @param	string	$key
	 * @return	boolean
	 */
	private function has($key) {
		return $this->collection->get($key) !== null;
	}
}
