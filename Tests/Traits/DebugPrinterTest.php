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
 * test case for DebugPrinter
 */
namespace Circle\UtilityBundle\Tests\Traits;

use Circle\UtilityBundle\Tests\Fixtures\DebugPrinterImpl;
use Circle\UtilityBundle\Tests\Mocker\Interfaces;

/**
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\Tests\Traits
 * @copyright	TeeAge-Beatz UG 2013-2014
 * @internal
 * 
 * @coversDefaultClass	Circle\UtilityBundle\Traits\DebugPrinter
 * 
 * @SuppressWarnings("PHPMD.StaticAccess");
 */
class DebugPrinterTest extends \PHPUnit_Framework_TestCase {
	use Interfaces;
	
	private function createOne() {
		return new DebugPrinterImpl();
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::_toDebugString
	 * @covers	::_getType
	 */
	public function toDebugString() {
		$printer = $this->createOne();
		$this->assertEquals("test", $printer->toDebugString("test"));
		$this->assertEquals("2.2", $printer->toDebugString(2.2));
		$this->assertEquals("1", $printer->toDebugString(1));
		$this->assertEquals("true", $printer->toDebugString(true));
		$this->assertEquals("false", $printer->toDebugString(false));
		$this->assertEquals("Array\n(\n    [test] => 1\n    [0] => 2\n)\n", $printer->toDebugString(array("test" => "1", 2)));
		$this->assertEquals("null", $printer->toDebugString(null));
		$this->assertEquals("stdClass Object\n(\n)\n", $printer->toDebugString(new \stdClass));
		$this->assertEquals("testValue", $printer->toDebugString($this->mockPrintable("testValue")));
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::toStringFlat
	 */
	public function toStringFlat() {
		$this->assertEquals("perhaps you should think about implementing this function ;-)", $this->createOne()->toStringFlat());
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::toStringDeep
	 */
	public function toStringDeep() {
		$this->assertEquals("perhaps you should think about implementing this function ;-)", $this->createOne()->toStringDeep());
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::_toStringDeep
	 * @uses	Circle\UtilityBundle\Traits\DebugPrinter::toStringFlat
	 * @depends	toStringFlat
	 */
	public function toStringDeepPriv() {
		$this->assertEquals("perhaps you should think about implementing this function ;-)\n\tdeepTest1\n\tdeepTest2", $this->createOne()->toStringDeepPriv(array(
			$this->mockDeepPrintable("test1", "deepTest1"),
			$this->mockDeepPrintable("test2", "deepTest2")
		), "\n"));
	}
}