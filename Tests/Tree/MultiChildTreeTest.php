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
 * test case for Query
 */
namespace Ci\UtilityBundle\Tests\Tree;

use Ci\UtilityBundle\Tests\Fixtures\MultiChildTreeImpl;
use Ci\UtilityBundle\Tree\MultiChildTree;
use Ci\UtilityBundle\Tests\Mocker\Tree;
use Ci\UtilityBundle\Tests\Mocker\Interfaces;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Ci\UtilityBundle\Tests\Tree
 * @copyright	TeeAge-Beatz UG 2013-2014
 * @internal
 * 
 * @coversDefaultClass	Ci\UtilityBundle\Tree\MultiChildTree
 * @uses				Ci\UtilityBundle\Tree\MultiChildTree::__construct
 * 
 * @SuppressWarnings("PHPMD.StaticAccess");
 */
class MultiChildTreeTest extends \PHPUnit_Framework_TestCase {	
	use Tree;
	use Interfaces;
	
	private function createOne($root) {
		return new MultiChildTreeImpl($root);
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::__construct
	 */	
	public function construct() {
		$this->assertInstanceOf("Ci\UtilityBundle\Tree\Tree", $this->createOne($this->mockRootNode()));
		return $this->createOne($this->mockRootNode());
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::root
	 * @depends	construct
	 */
	public function root(MultiChildTree $tree) {
		$this->assertEquals($this->mockRootNode(), $tree->getRoot());	
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::__toString
	 * @depends	construct
	 */
	public function toStringTest() {
		$this->assertEquals("RootStringified", $this->createOne($this->mockRootNode("RootStringified"))->__toString());
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::getNodes
	 * @covers	::getAll
	 * @uses	Ci\UtilityBundle\Tree\MultiChildTree::root
	 * @depends	construct
	 */
	public function getNodesAndGetAll(MultiChildTree $tree) {
		$tree->getRoot()->expects($this->any())
		                ->method("getAllChildren")
		                ->with($this->equalTo(new ArrayCollection()))
		                ->will($this->returnArgument(0));
		
		$this->assertEquals(new ArrayCollection(), $tree->getNodes());
		$this->assertEquals(new ArrayCollection(), $tree->getAll());
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::get
	 * @covers	::getPriv
	 * @covers	::getPrivRec
	 * @uses	Ci\UtilityBundle\Tree\MultiChildTree::root
	 * @depends	construct
	 */
	public function get(MultiChildTree $tree) {
		$vectorArr = array(1,2,3);
		$tree->getRoot()->expects($this->any())
		                ->method("getChild")
		                ->will($this->returnValue($tree->getRoot()));
		
		$this->assertEquals($tree->getRoot(), $tree->get($this->mockVector("Test", $vectorArr)));
		return $tree;
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::add
	 * @uses	Ci\UtilityBundle\Tree\MultiChildTree::root
	 * @uses	Ci\UtilityBundle\Tree\MultiChildTree::get
	 * @uses	Ci\UtilityBundle\Tree\MultiChildTree::getPriv
	 * @uses	Ci\UtilityBundle\Tree\MultiChildTree::getPrivRec
	 * @depends	get
	 */
	public function add(MultiChildTree $tree) {
		$node = $this->mockNode();
		
		$tree->getRoot()->expects($this->once())
		                ->method("addChild")
		                ->with($this->equalTo("test"), $this->equalTo($node));
		
		$this->assertSame($tree, $tree->add($this->mockVector("test", array("test")), $node));
	}
}