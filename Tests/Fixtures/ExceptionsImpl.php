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
 * public wrapper for exceptions trait
 */
namespace Circle\UtilityBundle\Tests\Fixtures;

use Circle\UtilityBundle\Exceptions\Exceptions;
use Symfony\Component\Form\Extension\Core\ChoiceList\ObjectChoiceList;

/**
 * public wrapper for exceptions trait
 * 
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\Tests\Fixtures
 * @copyright	TeeAge-Beatz UG 2013-2014
 * @internal
 * 
 * @SuppressWarnings("PHPMD")
 */
class ExceptionsImpl {
	use Exceptions;
	
	/**
	 * public wrapper for _immutableException
	 * 
	 * @param	string	$key
	 */
	public function immutableException($key) {
		return $this->_immutableException($key);
	}
	
	/**
	 * public wrapper for _noKeyException
	 * 
	 * @param	string	$key
	 */
	public function noKeyException($key) {
		return $this->_noKeyException($key);
	}
	
	/**
	 * public wrapper for _notInitializedException
	 * 
	 * @param	object	$class
	 * @param	string	$method
	 */
	public function notInitializedException($class, $method) {
		return $this->_notInitializedException($class, $method);
	}
	
	/**
	 * public wrapper for _wrongTypeException
	 * 
	 * @param	string	$name
	 * @param	object	$param
	 * @param	string	$expected
	 */
	public function wrongTypeException($name, $param, $expected) {
		return $this->_wrongTypeException($name, $param, $expected);
	}
	
	/**
	 * public wrapper for _wrongKeyTypeException
	 * 
	 * @param	object	$key
	 * @param	string	$expected
	 */
	public function wrongKeyTypeException($key, $expected) {
		return $this->_wrongKeyTypeException($key, $expected);
	}
}