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
 * test case for exceptions
 */
namespace Circle\UtilityBundle\Tests\Exceptions;

use Circle\UtilityBundle\Tests\Fixtures\ExceptionsImpl;

/**
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\Tests\Exceptions
 * @copyright	TeeAge-Beatz UG 2013-2014
 * @internal
 * 
 * @coversDefaultClass	Circle\UtilityBundle\Exceptions\Exceptions
 * 
 * @SuppressWarnings("PHPMD.StaticAccess");
 */
class ExceptionsTest extends \PHPUnit_Framework_TestCase {
	/**
	 * @var Circle\UtilityBundle\Tests\Fixtures\ExceptionsImpl
	 */
	private $exceptions;
	
	public function setUp() {
		$this->exceptions = new ExceptionsImpl();
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::_immutableException
	 * @covers	Circle\UtilityBundle\Exceptions\ImmutableException
	 * 
	 * @expectedException	Circle\UtilityBundle\Exceptions\ImmutableException
	 */	
	public function immutableException() {
		$this->exceptions->immutableException("test");
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::_noKeyException
	 * @covers	Circle\UtilityBundle\Exceptions\NoKeyException
	 * @uses	Circle\UtilityBundle\Traits\DebugPrinter
	 *
	 * @expectedException	Circle\UtilityBundle\Exceptions\NoKeyException
	 */
	public function noKeyException() {
		$this->exceptions->noKeyException("test");
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::_notInitializedException
	 * @covers	Circle\UtilityBundle\Exceptions\NotInitializedException
	 *
	 * @expectedException	Circle\UtilityBundle\Exceptions\NotInitializedException
	 */
	public function notInitializedException() {
		$this->exceptions->notInitializedException(new \stdClass, "test");
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::_wrongTypeException
	 * @covers	Circle\UtilityBundle\Exceptions\WrongTypeException
	 * @uses	Circle\UtilityBundle\Traits\DebugPrinter
	 *
	 * @expectedException	Circle\UtilityBundle\Exceptions\WrongTypeException
	 */
	public function wrongTypeException() {
		$this->exceptions->wrongTypeException("test", new \stdClass(), "test");
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::_wrongKeyTypeException
	 * @covers	Circle\UtilityBundle\Exceptions\WrongKeyTypeException
	 * @uses	Circle\UtilityBundle\Traits\DebugPrinter
	 * @uses	Circle\UtilityBundle\Exceptions\WrongTypeException
	 * @depends	wrongTypeException
	 *
	 * @expectedException	Circle\UtilityBundle\Exceptions\WrongKeyTypeException
	 */
	public function wrongKeyTypeException() {
		$this->exceptions->wrongKeyTypeException(new \stdClass(), "test");
	}
}