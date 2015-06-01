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
 * test case for Functional trait
 */
namespace Circle\UtilityBundle\Tests\Traits;

use Circle\UtilityBundle\Tests\Fixtures\FunctionalPrivImpl;

/**
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\Tests\Traits
 * @copyright	TeeAge-Beatz UG 2013-2014
 * @internal
 * 
 * @coversDefaultClass	Circle\UtilityBundle\Traits\FunctionalPriv
 * 
 * @SuppressWarnings("PHPMD.StaticAccess");
 */
class FunctionalPrivTest extends \PHPUnit_Framework_TestCase {
	
	private function createOne() {
		return new FunctionalPrivImpl();
	}

	/**
	 * @test
	 * @group	small
	 * @covers	::_map
	 */
	public function map() {
		$this->assertEquals(array(10, 20), $this->createOne()->map(array(5, 10), function($elem) {
			return $elem*2;
		}));
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::_reduce
	 */
	public function reduce() {
		$this->assertEquals(50, $this->createOne()->reduce(array(25, 20), function($elem, $carry) {
			return $carry += $elem;
		}, 5));
	}
}