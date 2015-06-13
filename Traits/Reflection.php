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
 * public reflection trait
 */
namespace Circle\UtilityBundle\Traits;

use Doctrine\Common\Collections\ArrayCollection;
/**
 * trait for reflection to use if the reflection api
 * needs to be public (e.q. implements interface Reflectable)
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\Traits
 * @copyright	TeeAge-Beatz UG 2014
 */
trait Reflection {
	use ReflectionPriv;
	
	/**
	 * (non-PHPdoc)
	 * @see Circle\UtilityBundle\Traits\Reflection::_alias()
	 */
	public function alias() {
		return $this->_alias();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Circle\UtilityBundle\Traits\Reflection::_className()
	 */
	public function className() {
		return $this->_className();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Traits\Reflection::_exists()
	 * 
	 * @param  string $property
	 * @return bool
	 */
	public function exists($property) {
		return $this->_exists($property);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Traits\Reflection::_reflect()
	 */
	public function reflect() {
		return $this->_reflect();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Traits\Reflection::_getMethods()
	 */
	public function getMethods() {
		return $this->_getMethods();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Traits\Reflection::_getProperties()
	 */
	public function getProperties() {
		return $this->_getProperties();
	}

	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Traits\Reflection::_getTraits()
	 */
	public function getTraits() {
		return $this->_getTraits();
	}

	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Traits\Reflection::_getTraitNames()
	 */
	public function getTraitNames() {
		return $this->_getTraitNames();
	}

	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Traits\Reflection::_getInterfaceNames()
	 */
	public function getInterfaceNames() {
		return $this->_getInterfaceNames();
	}
}