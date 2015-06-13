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
 * this type can reflect itself
 */
namespace Circle\UtilityBundle\Interfaces;

use Circle\UtilityBundle\Interfaces\Container;

/**
 *
 * a type that can give information
 * about itself.
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\Interfaces
 * @copyright	TeeAge-Beatz UG 2014
 */
interface Reflectable {
	/**
	 * 
	 * returns the short class name of this type
	 * 
	 * @return	string
	 */
	public function alias();
	
	/**
	 * 
	 * returns the classname incl. namespace as
	 * a string
	 * 
	 * @return	string
	 */
	public function className();
	
	/**
	 * 
	 * checks if a property exists on this
	 * class.
	 * 
	 * @param	string	$property
	 * @return	boolean
	 */
	public function exists($property);
	
	/**
	 * 
	 * returns the reflection class of
	 * this object
	 * 
	 * @return	\ReflectionClass
	 */
	public function reflect();
	
	/**
	 * 
	 * returns all methods of this class
	 * as reflectionmethods
	 * 
	 * @return	Container
	 */
	public function getMethods();
	
	/**
	 *
	 * returns all properties of this class
	 * as reflectionproperties
	 *
	 * @return	Container
	 */
	public function getProperties();

	/**
	 * returns all traits of this class wrapped
	 * in an immutable container
	 *
	 * @return Container
	 */
	public function getTraits();

	/**
	 * returns all traits names of this class wrapped
	 * in an immutable container
	 *
	 * @return Container
	 */
	public function getTraitNames();

	/**
	 * returns all interface names
	 *
	 * @return Container
	 */
	public function getInterfaceNames();
}