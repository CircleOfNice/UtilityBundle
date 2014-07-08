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
 * trait with debugging helper functions
 */
namespace Ci\UtilityBundle\Traits;

use Ci\UtilityBundle\Interfaces\DeepPrintable;
use Ci\UtilityBundle\Interfaces\Printable;

/**
 * trait to be used when in need for helper functions
 * for debugging/stringifying objects
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Ci\UtilityBundle\Traits
 * @copyright	TeeAge-Beatz UG 2014
 */
trait DebugPrinter {
	/**
	 * takes a value an stringifies it for debugging
	 * purposes
	 * 
	 * @SuppressWarnings("PHPMD.StaticAccess");
	 * 
	 * @param	mixed	$param
	 * @return	string
	 */
	private function _toDebugString($param) {
		$type = $this->_getType($param);
		if($type == "NULL")		return "null";
		if($type == "boolean")	return $param ? "true" : "false";
		if($type == "array")	return (string) print_r($param, true);
		if($type == "object")	return $param instanceof Printable ? (string) $param : (string) print_r($param, true);
		//possible $types "resource" and "unknown type are not handled
		//if a problem occurs here, we need to handle these cases
		return (string) $param;
	}
	
	/**
	 * prints an object deeply, useful for example for
	 * a tree
	 * 
	 * @param	array	$nested
	 * @param	string	$tabs
	 * @return	string
	 */
	private function _toStringDeep(array $nested, $tabs) {
		$tabs = $tabs."\t";
		return $this->toStringFlat().array_reduce($nested, function($string, DeepPrintable $child) use($tabs, $nested) {
			return $string .= $tabs.$child->toStringDeep($tabs);
		});
	}
	
	/**
	 * this function stringifies the current object deeply. it
	 * is implemented here only to let people know this
	 * should be implemented separatly for every object
	 * that needs it.
	 *
	 * @return	string
	 */
	public function toStringDeep() {
		return "perhaps you should think about implementing this function ;-)";
	}
	
	/**
	 * this function stringifies the current object. it
	 * is implemented here only to let people know this
	 * should be implemented separatly for every object
	 * that needs it.
	 * 
	 * @return	string
	 */
	public function toStringFlat() {
		return "perhaps you should think about implementing this function ;-)";
	}
	
	/**
	 * returns the type of given parameter
	 * 
	 * @param	string	$param
	 * @return	string
	 */
	private function _getType($param) {
		return gettype($param);
	}
}