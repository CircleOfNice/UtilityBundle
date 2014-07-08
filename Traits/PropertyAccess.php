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
 * convenience utility for internally tracking access to properties
 */
namespace Ci\UtilityBundle\Traits;

/**
 * convenience utility for internally tracking access to properties
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Ci\UtilityBundle\Traits
 * @copyright	TeeAge-Beatz UG 2014
 */
trait PropertyAccess {
	/**
	 * @var		array	saves the accesses to properties
	 */
	private $accessTable;
	
	/**
	 * checks if key may be accessed
	 * 
	 * @param  String	$key
	 * @return boolean
	 */
	final protected function mayAccess($key) {
		return $this->accessCount($key) < 1;
	}
	
	/**
	 * returns how often the key was accessed
	 * 
	 * @param  string	$key
	 * @return int
	 */
	final protected function accessCount($key) {
		return empty($this->accessTable[$key]) ? 0 : $this->accessTable[$key];
	}
	
	/**
	 * increases the access count of given key
	 * 
	 * @param  string	$key
	 * @return $this
	 */
	final protected function incAccessCount($key) {
		$this->accessTable[$key] = $this->accessCount($key)+1;
		return $this;
	}
}
