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
 * test case for PropertyAccess
 */
namespace Circle\UtilityBundle\Tests\Traits;

use Circle\UtilityBundle\Tests\Fixtures\PropertyAccessImpl;

/**
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\Tests\Traits
 * @copyright	TeeAge-Beatz UG 2013-2014
 * @internal
 * 
 * @coversDefaultClass	Circle\UtilityBundle\Traits\PropertyAccess
 * 
 * @SuppressWarnings("PHPMD.StaticAccess");
 */
class PropertyAccessTest extends \PHPUnit_Framework_TestCase {
	private function createOne() {
		return new PropertyAccessImpl();
	}

	/**
	 * @test
	 * @group	small
	 * @covers	::accessCount
	 * @covers	::mayAccess
	 * @covers	::incAccessCount
	 */
	public function propertyAccess() {
		$object = $this->createOne();
		$this->assertEquals(0, $object->accessCountPub("test"));
		$this->assertTrue($object->mayAccessPub("test"));
		$this->assertSame($object, $object->incAccessCountPub("test"));
		$this->assertEquals(1, $object->accessCountPub("test"));
		$this->assertFalse($object->mayAccessPub("test"));
	}
}