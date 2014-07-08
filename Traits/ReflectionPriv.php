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
 * trait to be used when reflection is needed
 */
namespace Ci\UtilityBundle\Traits;

use Ci\UtilityBundle\Container\ImmutableContainer;
/**
 * trait to be used when reflection is needed
 * with a specific class
 * 
 * TODO: build a wrapper class arounf reflectionclass
 * and return this with reflect, remove then other methods
 * or refactor them to the new wrapper
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Ci\UtilityBundle\Traits
 * @copyright	TeeAge-Beatz UG 2014
 */
trait ReflectionPriv {
	/**
	 * returns the alias string of the using
	 * object
	 * 
	 * @return	string
	 */
	private function _alias() {
		return $this->_toAlias($this->_className());
	}
	
	/**
	 * returns the long class name of the using 
	 * object as a string
	 * 
	 * @return	string
	 */
	private function _className() {
		return get_class($this);
	}
	
	/**
	 * returns the alias of the using object in
	 * a way so that it can be used as a key or
	 * property (first letter lowercase)
	 * 
	 * @return	string
	 */
	private function _aliasAsProperty() {
		return lcfirst($this->_alias());
	}
	
	/**
	 * checks if the given property exists on this
	 * object
	 * 
	 * @param	string	$property
	 * @return	boolean
	 */
	private function _exists($property) {
		return property_exists($this, $property);
	}
	
	/**
	 * returns the reflection class that belongs
	 * to this object
	 * 
	 * @SuppressWarnings("PHPMD.StaticAccess");
	 * 
	 * @return \ReflectionClass
	 */
	private function _reflect() {
		return new \ReflectionClass($this);
	}
	
	/**
	 * shortens a classname with namespace
	 * to the short classname at its end
	 * 
	 * @param	string	$className
	 * @return	string
	 */
	private function _toAlias($className) {
		$splitted = explode("\\", $className);
		return (string) array_pop($splitted);
	}
	
	/**
	 * returns all methods of this class wrapped 
	 * in an immutable container
	 * 
	 * @return Ci\UtilityBundle\Container\ImmutableContainer
	 */
	private function _getMethods() {
		return new ImmutableContainer($this->_reflect()->getMethods());
	}
	
	/**
	 * returns all properties of this class wrapped
	 * in an immutable container
	 *
	 * @return Ci\UtilityBundle\Container\ImmutableContainer
	 */
	private function _getProperties() {
		return new ImmutableContainer($this->_reflect()->getProperties());
	}
}