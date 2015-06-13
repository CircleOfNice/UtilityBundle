<?php
/*
 * Circle\UtilityBundle provides a set of reusable php/symfony utilities
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
 * generic container
 */
namespace Circle\UtilityBundle\Interfaces;

/**
 * 
 * a generic container whose properties are accessible
 * through a get function
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\Interfaces
 * @copyright	TeeAge-Beatz UG 2014
 */
interface Container {
	/**
	 * 
	 * returns the value with the
	 * index $key
	 * 
	 * @param	string		$key
	 * @throws	Circle\UtilityBundle\Exceptions\NoKeyException
	 * @return	mixed
	 */
	public function get($key);
	
	/**
	 * 
	 * returns this container as an
	 * array
	 * 
	 * @return	array
	 */
	public function toArray();

	/**
	 * returns if the container contains the given element
	 *
	 * @param  mixed $element
	 * @return bool
	 */
	public function contains($element);
}