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
 * implementation of generictree
 */
namespace Circle\UtilityBundle\Tests\Fixtures;

use Circle\UtilityBundle\Tree\MultiChildTree;

/**
 * mock implementation of generictree
 * 
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\Tests\Fixtures
 * @copyright	TeeAge-Beatz UG 2013-2014
 * @internal
 * 
 * @SuppressWarnings("PHPMD")
 */
class MultiChildTreeImpl extends MultiChildTree {
	/**
	 * public wrapper for root
	 * 
	 * @return \Circle\UtilityBundle\Tree\Circle\UtilityBundle\Tree\RootNode
	 */
	public function getRoot() {
		return $this->root();
	}
}