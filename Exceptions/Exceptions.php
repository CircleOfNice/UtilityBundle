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
 * trait to throw exceptions
 */
namespace Ci\UtilityBundle\Exceptions;

/**
 * trait with a private function for every bundles exception.
 * this is used to encapsulate the instantiation of the 
 * exceptions in one place.
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Ci\UtilityBundle\Exceptions
 * @copyright	TeeAge-Beatz UG 2014
 * @internal
 * 
 * @SuppressWarnings("PHPMD.StaticAccess")
 */
trait Exceptions {
	/**
	 * 
	 * throws a NoKeyException
	 * 
	 * @param	string												$key
	 * @throws	Ci\UtilityBundle\Exceptions\NoKeyException
	 * @return	void
	 */
	private function _noKeyException($key) {
		throw new NoKeyException($key, $this);
	}
	
	/**
	 * 
	 * throws a WrongKeyTypeException
	 * 
	 * @param	object												$key	
	 * @param	string												$expected
	 * @throws	Ci\UtilityBundle\Exceptions\WrongKeyTypeException
	 * @return	void
	 */
	private function _wrongKeyTypeException($key, $expected) {
		throw new WrongKeyTypeException($key, $expected);
	}
	
	/**
	 * 
	 * throws an ImmutableException
	 * 
	 * @param	string												$key
	 * @throws	Ci\UtilityBundle\Exceptions\ImmutableException
	 */
	private function _immutableException($key) {
		throw new ImmutableException($key);
	}
	
	/**
	 * 
	 * throws a NotInitializedException
	 * 
	 * @param	object												$class
	 * @param	string												$method
	 * @throws	Ci\UtilityBundle\Exceptions\NotInitializedException
	 */
	private function _notInitializedException($class, $method) {
		throw new NotInitializedException($class, $method);
	}
	
	/**
	 * 
	 * throws WrongTypeException
	 * 
	 * @param	string												$name
	 * @param	object												$param
	 * @param	string												$expected
	 * @throws	Ci\UtilityBundle\Exceptions\WrongTypeException
	 */
	private function _wrongTypeException($name, $param, $expected) {
		throw new WrongTypeException($name, $param, $expected);
	}
}