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
 * test case for Reflection
 */
namespace Circle\UtilityBundle\Tests\Traits;

use Circle\UtilityBundle\Tests\Fixtures\ReflectionImpl;

/**
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\Tests\Traits
 * @copyright	TeeAge-Beatz UG 2013-2014
 * @internal
 * 
 * @coversDefaultClass	Circle\UtilityBundle\Traits\Reflection
 * @uses				Circle\UtilityBundle\Traits\ReflectionPriv
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
	 * @covers	Circle\UtilityBundle\Traits\ReflectionPriv::_className
	 */
	public function className() {
		$this->assertEquals("Circle\UtilityBundle\Tests\Fixtures\ReflectionImpl", $this->createOne()->className());
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::alias
	 * @covers	Circle\UtilityBundle\Traits\ReflectionPriv::_alias
	 * @covers	Circle\UtilityBundle\Traits\ReflectionPriv::_toAlias
	 * @depends	className
	 */
	public function alias() {
		$this->assertEquals("ReflectionImpl", $this->createOne()->alias());
	}

	/**
	 * @test
	 * @group	small
	 * @covers	::exists
	 * @covers	Circle\UtilityBundle\Traits\ReflectionPriv::_exists
	 */
	public function exists() {
		$this->assertFalse($this->createOne()->exists("test"));
		$this->assertTrue($this->createOne()->exists("property"));
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::reflect
	 * @covers	Circle\UtilityBundle\Traits\ReflectionPriv::_reflect
	 */
	public function reflect() {
		$this->assertEquals(new \ReflectionClass($this->createOne()), $this->createOne()->reflect());
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	Circle\UtilityBundle\Traits\ReflectionPriv::_aliasAsProperty
	 * @depends	alias
	 */
	public function aliasAsProperty() {
		$this->assertEquals("reflectionImpl", $this->createOne()->aliasAsPropery());
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::getMethods
	 * @covers	Circle\UtilityBundle\Traits\ReflectionPriv::_getMethods
	 * @depends	reflect
	 * @uses	Circle\UtilityBundle\Container\ImmutableContainer
	 */
	public function getMethods() {
		$this->assertInstanceOf("Circle\UtilityBundle\Container\ImmutableContainer", $this->createOne()->getMethods());
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::getProperties
	 * @covers	Circle\UtilityBundle\Traits\ReflectionPriv::_getProperties
	 * @depends	reflect
	 * @uses	Circle\UtilityBundle\Container\ImmutableContainer
	 */
	public function getProperties() {
		$this->assertInstanceOf("Circle\UtilityBundle\Container\ImmutableContainer", $this->createOne()->getProperties());
	}

	/**
	 * @test
	 * @group	small
	 * @covers	::getTraits
	 * @covers	Circle\UtilityBundle\Traits\ReflectionPriv::_getTraits
	 * @covers	Circle\UtilityBundle\Traits\ReflectionPriv::_getAllTraits
	 * @depends	reflect
	 * @uses	Circle\UtilityBundle\Container\ImmutableContainer
	 */
	public function getTraits() {
		$this->assertInstanceOf("Circle\UtilityBundle\Container\ImmutableContainer", $this->createOne()->getTraits());
	}

	/**
	 * @test
	 * @group	small
	 * @covers	::getTraitNames
	 * @covers	Circle\UtilityBundle\Traits\ReflectionPriv::_getTraitNames
	 * @covers	Circle\UtilityBundle\Traits\ReflectionPriv::_getAllTraitNames
	 * @depends	reflect
	 * @uses	Circle\UtilityBundle\Container\ImmutableContainer
	 */
	public function getTraitNames() {
		$this->assertInstanceOf("Circle\UtilityBundle\Container\ImmutableContainer", $this->createOne()->getTraitNames());
	}

	/**
	 * @test
	 * @group	small
	 * @covers	::getInterfaceNames
	 * @covers	Circle\UtilityBundle\Traits\ReflectionPriv::_getInterfaceNames
	 * @depends	reflect
	 * @uses	Circle\UtilityBundle\Container\ImmutableContainer
	 */
	public function getInterfaceNames() {
		$this->assertInstanceOf("Circle\UtilityBundle\Container\ImmutableContainer", $this->createOne()->getInterfaceNames());
	}
}