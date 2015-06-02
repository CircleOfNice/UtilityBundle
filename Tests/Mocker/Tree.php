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
 * mocker for tree classes
 */
namespace Circle\UtilityBundle\Tests\Mocker;

/**
 * mocker for tree classes
 * 
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\Tests\Mocker
 * @copyright	TeeAge-Beatz UG 2013-2014
 * @internal
 * 
 * @SuppressWarnings("PHPMD.StaticAccess")
 */
trait Tree {
	/**
	 * mocks a node
	 * 
	 * @return	Circle\UtilityBundle\Tree\Node
	 */
	protected function mockNode() {
		$mock = $this->getMockBuilder("Circle\UtilityBundle\Tree\Node")
		             ->getMock();
		return $mock;
	}
	
	/**
	 * mocks a rootnode
	 * 
	 * @param	string	$string
	 * @return	Circle\UtilityBundle\Tree\RootNode
	 */
	protected function mockRootNode($string = "") {
		$mock = $this->getMock("Circle\UtilityBundle\Tree\RootNode");
		
		$mock->expects($this->any())
		     ->method("__toString")
		     ->will($this->returnValue($string));
		
		return $mock;
	}
	
	/**
	 * mocks a tree
	 * 
	 * @return	Circle\UtilityBundle\Tree\Tree
	 */
	protected function mockTree() {
		$mock = $this->getMockBuilder("Circle\UtilityBundle\Tree\Tree")
		             ->getMock();
		return $mock;
	}

	/*private function methodToString($mock, $string) {
		$mock->expects($this->any())
		     ->method("__toString")
		     ->will($this->returnValue($string));
		
		return $mock;
	}*/
}