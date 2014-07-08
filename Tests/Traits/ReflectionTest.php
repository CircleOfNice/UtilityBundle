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
 * test case for Reflection
 */
namespace Ci\UtilityBundle\Tests\Traits;

use Ci\UtilityBundle\Tests\Fixtures\ReflectionImpl;

/**
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Ci\UtilityBundle\Tests\Traits
 * @copyright	TeeAge-Beatz UG 2013-2014
 * @internal
 * 
 * @coversDefaultClass	Ci\UtilityBundle\Traits\Reflection
 * @uses				Ci\UtilityBundle\Traits\ReflectionPriv
 * 
 * @SuppressWarnings("PHPMD.StaticAccess");
 */
class ReflectionTest extends \PHPUnit_Framework_TestCase {
	private function createOne() {
		return new ReflectionImpl();
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::className
	 * @covers	Ci\UtilityBundle\Traits\ReflectionPriv::_className
	 */
	public function className() {
		$this->assertEquals("Ci\UtilityBundle\Tests\Fixtures\ReflectionImpl", $this->createOne()->className());
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::alias
	 * @covers	Ci\UtilityBundle\Traits\ReflectionPriv::_alias
	 * @covers	Ci\UtilityBundle\Traits\ReflectionPriv::_toAlias
	 * @depends	className
	 */
	public function alias() {
		$this->assertEquals("ReflectionImpl", $this->createOne()->alias());
	}

	/**
	 * @test
	 * @group	small
	 * @covers	::exists
	 * @covers	Ci\UtilityBundle\Traits\ReflectionPriv::_exists
	 */
	public function exists() {
		$this->assertFalse($this->createOne()->exists("test"));
		$this->assertTrue($this->createOne()->exists("property"));
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::reflect
	 * @covers	Ci\UtilityBundle\Traits\ReflectionPriv::_reflect
	 */
	public function reflect() {
		$this->assertEquals(new \ReflectionClass($this->createOne()), $this->createOne()->reflect());
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	Ci\UtilityBundle\Traits\ReflectionPriv::_aliasAsProperty
	 * @depends	alias
	 */
	public function aliasAsProperty() {
		$this->assertEquals("reflectionImpl", $this->createOne()->aliasAsPropery());
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::getMethods
	 * @covers	Ci\UtilityBundle\Traits\ReflectionPriv::_getMethods
	 * @depends	reflect
	 * @uses	Ci\UtilityBundle\Container\ImmutableContainer
	 */
	public function getMethods() {
		$this->assertInstanceOf("Ci\UtilityBundle\Container\ImmutableContainer", $this->createOne()->getMethods());
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::getProperties
	 * @covers	Ci\UtilityBundle\Traits\ReflectionPriv::_getProperties
	 * @depends	reflect
	 * @uses	Ci\UtilityBundle\Container\ImmutableContainer
	 */
	public function getProperties() {
		$this->assertInstanceOf("Ci\UtilityBundle\Container\ImmutableContainer", $this->createOne()->getProperties());
	}
}