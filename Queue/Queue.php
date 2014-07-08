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
 * interface for queues
 */
namespace Ci\UtilityBundle\Queue;

/**
 * 
 * interface for queues, preferably implemented in a
 * functional fashion, where tail returns a copy of 
 * the tail and the object itself is immutable
 * 
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Ci\UtilityBundle\Queue
 * @copyright	TeeAge-Beatz UG 2014
 */
interface Queue {
	/**
	 * 
	 * returns the first element of the queue
	 * 
	 * @return	mixed
	 */
	public function head();
	
	/**
	 * 
	 * returns all elements but the first as a
	 * new queue
	 * 
	 * @return	Ci\UtilityBundle\Queue\Queue
	 */
	public function tail();
	
	/**
	 * 
	 * checks if the queue is empty
	 * 
	 * @return	boolean
	 */
	public function isEmpty();
	
	/**
	 * 
	 * returns a stringified version of this queue
	 * where every element is concatenated with
	 * $glue in between
	 * 
	 * @param	string	$glue
	 * @return	string
	 */
	public function reduce($glue);
}