<?php
/*
 * Ci\UtilityBundle provides a set of reusable php/symfony utilities
 * (C) 2014 TeeAge-Beatz UG
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software Foundation,
 * Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301  USA
 */

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
 * @copyright	TeeAge-Beatz UG 2014
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
