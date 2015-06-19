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
 * trait to be used when reflection is needed
 */
namespace Circle\UtilityBundle\Traits;

use Circle\UtilityBundle\Container\ImmutableContainer;
use Doctrine\Common\Annotations\PhpParser;

/**
 * trait to be used when reflection is needed
 * with a specific class
 * 
 * TODO: build a wrapper class arounf reflectionclass
 * and return this with reflect, remove then other methods
 * or refactor them to the new wrapper
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\Traits
 * @copyright	TeeAge-Beatz UG 2014
 */
trait ReflectionPriv {

	/**
	 * @var \ReflectionClass
	 */
	private $reflection;

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
		return $this->reflection = empty($this->reflection) ? new \ReflectionClass($this) : $this->reflection;
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
	 * @SuppressWarnings("PHPMD.StaticAccess");
	 * 
	 * @return Circle\UtilityBundle\Container\ImmutableContainer
	 */
	private function _getMethods() {
		return new ImmutableContainer($this->_reflect()->getMethods());
	}
	
	/**
	 * returns all properties of this class wrapped
	 * in an immutable container
	 *
	 * @SuppressWarnings("PHPMD.StaticAccess");
	 *
	 * @return Circle\UtilityBundle\Container\ImmutableContainer
	 */
	private function _getProperties() {
		return new ImmutableContainer($this->_reflect()->getProperties());
	}

	/**
	 * returns all traits of this class wrapped
	 * in an immutable container
	 *
	 * @SuppressWarnings("PHPMD.StaticAccess");
	 *
	 * @return ImmutableContainer
	 */
	private function _getTraits() {
		return new ImmutableContainer($this->_getAllTraits($this->_reflect()));
	}

	/**
	 * returns all traits names of this class wrapped
	 * in an immutable container
	 *
	 * @SuppressWarnings("PHPMD.StaticAccess");
	 *
	 * @return ImmutableContainer
	 */
	private function _getTraitNames() {
		return new ImmutableContainer($this->_getAllTraitNames($this->_reflect()));
	}

	/**
	 * returns all trait names of this class and all
	 * trait names used in the traits used by the class
	 *
	 * @param  \ReflectionClass $class
	 * @param  string[]         $traits
	 * @return string[]
	 */
	private function _getAllTraitNames(\ReflectionClass $class, array $traits = array()) {
		foreach ($class->getTraits() as $trait) $traits = $this->_getAllTraitNames($trait, $traits);
		$traits = $class->getParentClass() instanceof \ReflectionClass ? $this->_getAllTraitNames($class->getParentClass(), $traits) : $traits;
		return $class->isTrait() ? array_merge($traits, array($class->getName())) : $traits;
	}

	/**
	 * returns all traits of this class and all
	 * traits used in the traits used by the class
	 *
	 * @param  \ReflectionClass   $class
	 * @param  \ReflectionClass[] $traits
	 * @return \ReflectionClass[]
	 */
	private function _getAllTraits(\ReflectionClass $class, array $traits = array()) {
		foreach ($class->getTraits() as $trait) $traits = $this->_getAllTraits($trait, $traits);
		$traits = $class->getParentClass() instanceof \ReflectionClass ? $this->_getAllTraits($class->getParentClass(), $traits) : $traits;
		return $class->isTrait() ? array_merge($traits, array($class)) : $traits;
	}

	/**
	 * returns all interface names
	 *
	 * @SuppressWarnings("PHPMD.StaticAccess");
	 *
	 * @return ImmutableContainer
	 */
	private function _getInterfaceNames() {
		return new ImmutableContainer($this->_reflect()->getInterfaceNames());
	}

	/**
	 * returns if the given trait is used or not
	 *
	 * @param  string $traitNamespace
	 * @return bool
	 */
	private function _usesTrait($traitNamespace) {
		if (!trait_exists($traitNamespace)) return false;

		$class   = $this->_reflect();
		foreach (get_class_methods($traitNamespace) as $methodName) if (!$class->hasMethod($methodName)) return false;
		return true;
	}

	/**
	 * returns all used namespaces
	 *
	 * @return string[]
	 */
	private function _getUses() {
		$parser  = new PhpParser();
		return $parser->parseClass($this->_reflect());
	}

	/**
	 * returns if the class has implemented the given
	 * method
	 *
	 * @param  string $name
	 * @return bool
	 */
	private function _hasMethod($name) {
		return $this->_reflect()->hasMethod($name);
	}

	/**
	 * returns the given method
	 *
	 * @param  string $name
	 * @return \ReflectionMethod
	 */
	private function _getMethod($name) {
		return $this->_reflect()->getMethod($name);
	}

	/**
	 * returns if the class has implemented the given
	 * property
	 *
	 * @param  string $name
	 * @return bool
	 */
	private function _hasProperty($name) {
		return $this->_reflect()->hasProperty($name);
	}

	/**
	 * returns the given property
	 *
	 * @param  string $name
	 * @return \ReflectionProperty
	 */
	private function _getProperty($name) {
		return $this->_reflect()->getProperty($name);
	}
}