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
 * mock implementation of DebugPrinter
 */
namespace Ci\UtilityBundle\Tests\Fixtures;

use Ci\UtilityBundle\Traits\DebugPrinter;

/**
 * mock implementation of trait debug printer, private functions
 * have a public wrapper for testing purposes
 * 
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Ci\UtilityBundle\Tests\Fixtures
 * @copyright	TeeAge-Beatz UG 2013-2014
 * @internal
 * 
 * @SuppressWarnings("PHPMD")
 */
class DebugPrinterImpl {
	use DebugPrinter;
	
	/**
	 * public wrapper for _toDebugString
	 * 
	 * @param	string	$param
	 * @return	string
	 */
	public function toDebugString($param) {
		return $this->_toDebugString($param);
	}
	
	/**
	 * public wrapper for nearly static deep
	 * printing function
	 * 
	 * @param	array	$nested
	 * @param	string	$tabs
	 * @return	string
	 */
	public function toStringDeepPriv(array $nested, $tabs) {
		return $this->_toStringDeep($nested, $tabs);
	}
}