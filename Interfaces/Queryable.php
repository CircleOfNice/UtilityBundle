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
 * interface for queryable types
 */
namespace Circle\UtilityBundle\Interfaces;

/**
 *
 * this type is can handle a query and will return 
 * a value of type result result
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\Interfaces
 * @copyright	TeeAge-Beatz UG 2014
 */
interface Queryable {
	/**
	 * 
	 * this function takes a querystring and returns
	 * a result
	 * 
	 * @param	string	$query
	 * @return	Circle\UtilityBundle\Interfaces\Result
	 */
	public function query($query);
}