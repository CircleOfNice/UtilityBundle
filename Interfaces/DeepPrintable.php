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
 * nested type that prints itself recursively
 */
namespace Ci\UtilityBundle\Interfaces;

/**
 *
 * This interface describes a type that can print itself 
 * recursively, e.g. a tree or a graph. this is useful 
 * for debugging purposes.
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Ci\UtilityBundle\Interfaces
 * @copyright	TeeAge-Beatz UG 2014
 */
interface DeepPrintable extends Printable {
	/**
	 * 
	 * returns this type stringified with
	 * all descendants. when used manually
	 * as an api it should be called without
	 * the $tabs argument.
	 * 
	 * @param	string	$tabs
	 * @return	string
	 */
	public function toStringDeep($tabs = "");
	
	/**
	 * returns only this entity without
	 * including all the descendants
	 * 
	 * @return	string
	 */
	public function toStringFlat();
}