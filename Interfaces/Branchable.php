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
 * list-like structure that uses vectors for positioning
 */
namespace Circle\UtilityBundle\Interfaces;

/**
 * 
 * Interface to describe a type that is searchable
 * by giving it a vector. a possible implementation
 * is a very generic tree, that adds his children and
 * gets his childrent with this methods.
 * 
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\Interfaces
 * @copyright	TeeAge-Beatz UG 2014
 */
interface Branchable {
	/**
	 * 
	 * adds a type of generic nature at the position
	 * that suits the vector.
	 * 
	 * @param	Circle\UtilityBundle\Interfaces\Vector		$path
	 * @param	Circle\UtilityBundle\Interfaces\GenericType	$node
	 * @return	$this
	 */
	public function add(Vector $path, GenericType $node);
	
	/**
	 * returns an object of the type of the implementing 
	 * collection that is at the position, that is defined
	 * by the given vector.
	 * 
	 * @param	Circle\UtilityBundle\Interfaces\Vector		$branch
	 * @return	Circle\UtilityBundle\Interfaces\GenericType
	 */
	public function get(Vector $branch);
	
	/**
	 * returns a list with all nodes of this branchable
	 * type
	 * 
	 * @return	Doctrine\Common\Collections\ArrayCollection
	 */
	public function getAll();
}