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
 * implementation of queue
 */
namespace Ci\UtilityBundle\Queue;

use Ci\UtilityBundle\Interfaces\Printable;

/**
 * class implements interface queue with a constructor
 * that takes an array
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Ci\UtilityBundle\Queue
 * @copyright	TeeAge-Beatz UG 2014
 */
final class ImmutableQueue implements Queue, Printable {
	/**
	 * @var		array saves the list
	 */
	private $list;
	
	/**
	 * constructs this queue with an array
	 * 
	 * @param	array	$array
	 */
	public function __construct(array $array = array()) {
		$this->list = $array;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Ci\UtilityBundle\Queue\Queue::isEmpty()
	 * 
	 * @return	boolean
	 */
	public function isEmpty() {
		return $this->head() == "";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Ci\UtilityBundle\Queue\Queue::head()
	 * 
	 * @return	mixed
	 */
	public function head() {
		return reset($this->list);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Ci\UtilityBundle\Queue\Queue::tail()
	 * 
	 * @return	Ci\UtilityBundle\Queue\Queue
	 */
	public function tail() {
		$list = array_merge(array(), $this->list);
		array_shift($list);
		return new $this($list);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Ci\UtilityBundle\Queue\Queue::__toString()
	 * 
	 * @return	string
	 */
	public function __toString() {
		return "Queue('".$this->reduce("', '")."')\n";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Ci\UtilityBundle\Queue\Queue::reduce()
	 * 
	 * @param	string	$glue
	 * @return	string
	 */
	public function reduce($glue) {
		return implode($this->list, $glue);
	}
}