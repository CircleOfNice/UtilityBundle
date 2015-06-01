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
 * mocker for Interfaces in this bundle
 */
namespace Circle\UtilityBundle\Tests\Mocker;

use Circle\UtilityBundle\Interfaces\Vector;
use Circle\UtilityBundle\Exceptions\Exceptions;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * mocker for Interfaces in this bundle
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\Tests\Mocker
 * @copyright	TeeAge-Beatz UG 2013-2014
 * @internal
 *
 * @SuppressWarnings("PHPMD.StaticAccess")
 */
trait Interfaces {
	use Exceptions;
	
	protected function mockReflectable($className) {
		$mock = $this->getMock("Circle\UtilityBundle\Interfaces\Reflectable");
		
		$mock->expects($this->any())
		     ->method("className")
		     ->will($this->returnValue($className));
		
		return $mock;
	}
	
	/**
	 * returns an instance of printable
	 * 
	 * @param	string	$toString
	 * @return	Circle\UtilityBundle\Interfaces\Printable
	 */
	protected function mockPrintable($toString) {
		$mock = $this->getMockBuilder("Circle\UtilityBundle\Interfaces\Printable")
					 ->getMock();

		return $this->mockPrintableFromExistingMock($mock, $toString);
	}
	
	/**
	 * returns an instance of printable
	 *
	 * @param	string	$toString
	 * @return	Circle\UtilityBundle\Interfaces\Printable
	 */
	private function mockPrintableFromExistingMock($mock, $toString) {
		$mock->expects($this->any())
		     ->method("__toString")
		     ->will($this->returnValue($toString));
	
		return $mock;
	}
	
	/**
	 * returns an instance of DeepPrintable
	 * 
	 * @param	string	$toStringFlat
	 * @param	string	$toStringDeep
	 * @return	Circle\UtilityBundle\Interfaces\DeepPrintable
	 */
	protected function mockDeepPrintable($toStringFlat, $toStringDeep) {
		$mock = $this->getMockBuilder("Circle\UtilityBundle\Interfaces\DeepPrintable")
		             ->getMock();
		
		$mock->expects($this->any())
		     ->method("toStringFlat")
		     ->will($this->returnValue($toStringFlat));
		
		$mock->expects($this->any())
		     ->method("toStringDeep")
		     ->will($this->returnValue($toStringDeep));
		
		return $mock;
	}
	
	/**
	 * mocks a vector
	 * 
	 * @param	string	$last
	 * @param	array	$values
	 * @return	Circle\UtilityBundle\Interfaces\Vector
	 */
	protected function mockVector($last = "", array $values = array()) {
		$mock = $this->getMockBuilder("Circle\UtilityBundle\Interfaces\Vector")
		             ->getMock();
		
		$isEmptyValues	= array();
		$tailValues		= array();

		foreach($values as $value) array_push($isEmptyValues, false);
		array_pop($isEmptyValues);
		array_push($isEmptyValues, true);
		
		foreach($values as $value) array_push($tailValues, $this->mockVector($last, array_slice($values, 1)));
		
		$mock->expects($this->any())
		     ->method("head")
			 ->will($this->onConsecutiveCallsArray($values));
		
		$mock->expects($this->any())
		     ->method("tail")
		     ->will($this->onConsecutiveCallsArray($tailValues));
		
		$mock->expects($this->any())
		     ->method("isEmpty")
		     ->will($this->onConsecutiveCallsArray($isEmptyValues));
	
		$mock->expects($this->any())
		     ->method("last")
			 ->will($this->returnValue($last));
	
		return $mock;
	}
	
	/**
	 * 
	 * @param	Circle\UtilityBundle\Interfaces\Vector	$vector
	 * @param	mixed									$value
	 * @return	Circle\UtilityBundle\Interfaces\Branchable
	 */
	public function mockBranchable(Vector $vector, $value = "", $throwsException = false, array $nodes = array()) {
		return $this->mockBranchableFromExistingMock($this->getMock("Circle\UtilityBundle\Interfaces\Branchable"), $vector, $value, $throwsException, $nodes);
	}
	
	private function mockBranchableFromExistingMock($mock, Vector $vector, $value = "", $throwsException = false, array $nodes = array()) {
		$mock->expects($this->any())
		     ->method("get")
		     ->with($throwsException ? $this->anything() : $this->equalTo($vector))
		     ->will($throwsException ? $this->throwException($this->_noKeyException("test")): $this->returnValue($value));
		
		$mock->expects($this->any())
		     ->method("getAll")
		     ->will($this->returnValue(new ArrayCollection($nodes)));
		
		return $mock;
	}
	
	/**
	 * describes the return values of consecutive calls
	 * with an array
	 * 
	 * @param	array	$arr
	 * @return	PHPUnit_Framework_MockObject_Stub_ConsecutiveCalls
	 */
	private function onConsecutiveCallsArray(array $arr) {
		return new \PHPUnit_Framework_MockObject_Stub_ConsecutiveCalls($arr);
	}
}