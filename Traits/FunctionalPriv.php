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
 * collection of functional methods
 */
namespace Ci\UtilityBundle\Traits;

/**
 * collection of functional methods to use everywhere
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Ci\UtilityBundle\Traits
 * @copyright	TeeAge-Beatz UG 2014
 */
trait FunctionalPriv {
	/**
	 * calls the given function with every array element
	 * as the parameter
	 * 
	 * @param	array		$array
	 * @param	callable	$function
	 * @return 	array:
	 */
	private function _map(array $array, callable $function) {
		return array_map($function, $array);
	}
	
	/**
	 * reduces an array to one atomic value with the given
	 * callback function
	 * 
	 * @param	array		$array
	 * @param	callable	$function
	 * @param	number		$initial
	 * @return	number
	 */
	private function _reduce(array $array, callable $function, $initial = 0) {
		return array_reduce($array, $function, $initial);
	}
}