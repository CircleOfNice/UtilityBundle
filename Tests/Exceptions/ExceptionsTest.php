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
 * test case for exceptions
 */
namespace Ci\UtilityBundle\Tests\Exceptions;

use Ci\UtilityBundle\Tests\Fixtures\ExceptionsImpl;

/**
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Ci\UtilityBundle\Tests\Exceptions
 * @copyright	TeeAge-Beatz UG 2013-2014
 * @internal
 * 
 * @coversDefaultClass	Ci\UtilityBundle\Exceptions\Exceptions
 * 
 * @SuppressWarnings("PHPMD.StaticAccess");
 */
class ExceptionsTest extends \PHPUnit_Framework_TestCase {
	/**
	 * @var Ci\UtilityBundle\Tests\Fixtures\ExceptionsImpl
	 */
	private $exceptions;
	
	public function setUp() {
		$this->exceptions = new ExceptionsImpl();
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::_immutableException
	 * @covers	Ci\UtilityBundle\Exceptions\ImmutableException
	 * 
	 * @expectedException	Ci\UtilityBundle\Exceptions\ImmutableException
	 */	
	public function immutableException() {
		$this->exceptions->immutableException("test");
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::_noKeyException
	 * @covers	Ci\UtilityBundle\Exceptions\NoKeyException
	 * @uses	Ci\UtilityBundle\Traits\DebugPrinter
	 *
	 * @expectedException	Ci\UtilityBundle\Exceptions\NoKeyException
	 */
	public function noKeyException() {
		$this->exceptions->noKeyException("test");
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::_notInitializedException
	 * @covers	Ci\UtilityBundle\Exceptions\NotInitializedException
	 *
	 * @expectedException	Ci\UtilityBundle\Exceptions\NotInitializedException
	 */
	public function notInitializedException() {
		$this->exceptions->notInitializedException(new \stdClass, "test");
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::_wrongTypeException
	 * @covers	Ci\UtilityBundle\Exceptions\WrongTypeException
	 * @uses	Ci\UtilityBundle\Traits\DebugPrinter
	 *
	 * @expectedException	Ci\UtilityBundle\Exceptions\WrongTypeException
	 */
	public function wrongTypeException() {
		$this->exceptions->wrongTypeException("test", new \stdClass(), "test");
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::_wrongKeyTypeException
	 * @covers	Ci\UtilityBundle\Exceptions\WrongKeyTypeException
	 * @uses	Ci\UtilityBundle\Traits\DebugPrinter
	 * @uses	Ci\UtilityBundle\Exceptions\WrongTypeException
	 * @depends	wrongTypeException
	 *
	 * @expectedException	Ci\UtilityBundle\Exceptions\WrongKeyTypeException
	 */
	public function wrongKeyTypeException() {
		$this->exceptions->wrongKeyTypeException(new \stdClass(), "test");
	}
}