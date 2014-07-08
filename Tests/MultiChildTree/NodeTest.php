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
 * test case for node
 */
namespace Ci\UtilityBundle\Tests\MultiChildTree;

use Ci\UtilityBundle\Tests\Fixtures\NodeImpl;
use Ci\UtilityBundle\MultiChildTree\Node;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * test for implementation of Node °Node
 * 
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Ci\UtilityBundle\Tests\MultiChildTree
 * @copyright	TeeAge-Beatz UG 2013-2014
 * @internal
 * 
 * @coversDefaultClass	Ci\UtilityBundle\MultiChildTree\Node
 * @uses				Ci\UtilityBundle\MultiChildTree\Node
 * @uses				Ci\UtilityBundle\Traits\DebugPrinter
 * @uses				Ci\UtilityBundle\Exceptions\Exceptions
 * @uses				Ci\UtilityBundle\Exceptions\NoKeyException
 * @uses				Ci\UtilityBundle\Exceptions\WrongTypeException
 * @uses				Ci\UtilityBundle\Exceptions\WrongKeyTypeException
 * 
 * @SuppressWarnings("PHPMD")
 */
class NodeTest extends \PHPUnit_Framework_TestCase {
	private function createOne() {
		$this->assertInstanceOf("Ci\UtilityBundle\Tree\Node", new NodeImpl());
		return new NodeImpl();
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::__construct
	 */	
	public function construct() {
		return $this->createOne();
	}
	
	/**
	 * @test
	 * @group	small
	 * @depends	construct
	 * @covers	::addChild
	 * @covers	::setParent
	 */
	public function addChild(Node $node) {
		//if a key was added it can't be overwritten
		$this->assertEquals($node, $node->addChild("key1", $this->createOne()));
		$this->assertEquals($node, $node->addChild("key1", $this->createOne()));
		$this->assertEquals($node, $node->addChild("key1", $this->createOne()));
		
		$this->assertEquals($node, $node->addChild("key2", $this->createOne()));
		$this->assertEquals($node, $node->addChild("key3", $this->createOne()));
		$this->assertEquals($node, $node->addChild("key4", $this->createOne()));
		return $node;
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::hasChild
	 * @depends	addChild
	 */
	public function hasChild(Node $node) {
		$this->assertTrue($node->hasChild("key1"));
		$this->assertTrue($node->hasChild("key2"));
		$this->assertTrue($node->hasChild("key3"));
		$this->assertTrue($node->hasChild("key4"));
		
		$this->assertFalse($node->hasChild("key5"));
		$this->assertFalse($node->hasChild("test"));
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::getChild
	 * @covers	::getChildPriv
	 * @depends	addChild
	 */
	public function getChild(Node $node) {
		$compare = $this->createOne();
		
		$node->addChild("compare", $compare);
		$node->addChild("compare", $this->createOne());
		$node->addChild("compare", $this->createOne());
		
		//works because of no reference comparison and
		//because generic node do not have values, so
		//here they're basically the same
		$this->assertEquals($compare, $node->getChild("key1"));
		$this->assertEquals($compare, $node->getChild("key2"));
		$this->assertEquals($compare, $node->getChild("key3"));
		$this->assertEquals($compare, $node->getChild("key4"));
		
		//assert that, once a node is added, it is immutable
		$this->assertSame($compare, $node->getChild("compare"));
		return $node;
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::getAllChildren
	 * @depends	addChild
	 */
	public function getAllChildren(Node $node) {
		$this->assertCount(6, $node->getAllChildren(new ArrayCollection()));
		$this->assertContainsOnly("Ci\UtilityBundle\Tree\Node", $node->getAllChildren(new ArrayCollection()));
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::getParent
	 * @depends	getChild
	 */
	public function getParent(Node $node) {
		$this->assertSame($node, $node->getChild("key1")->getParent());	
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::toStringFlat
	 * @depends	addChild
	 */
	public function toStringFlat(Node $node) {
		$this->assertEquals("°Node()\n", $node->toStringFlat());
		return $node;
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::toStringDeep
	 * @depends	toStringFlat
	 */
	public function toStringDeep(Node $node) {
		$node->getChild("key1")->addChild("test", $this->createOne());
		$output = "°Node()\n\t\t°Node()\n\t\t\t°Node()\n\t\t°Node()\n\t\t°Node()\n\t\t°Node()\n\t\t°Node()\n";
		$this->assertEquals($output, $node->toStringDeep("\t"));
		return $node;
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::__toString
	 * @depends	toStringFlat
	 * @depends	toStringDeep
	 */
	public function toStringTest(Node $node) {
		$output = "°Node()\n\t°Node()\n\t\t°Node()\n\t°Node()\n\t°Node()\n\t°Node()\n\t°Node()\n";
		$this->assertEquals($output, $node->__toString());
	}

	/**
	 * @test
	 * @group	small
	 * @covers	::getChild 
	 * @depends	construct
	 * 
	 * @expectedException Ci\UtilityBundle\Exceptions\NoKeyException
	 */
	public function getNonExistingChild(Node $node) {
		$node->getChild("nonExistentKey");
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::hasChild
	 * @depends	construct
	 * 
	 * @expectedException Ci\UtilityBundle\Exceptions\WrongKeyTypeException
	 */
	public function hasChildWithWrongType1(Node $node) {
		$node->hasChild(1);
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::hasChild
	 * @depends	construct
	 * 
	 * @expectedException Ci\UtilityBundle\Exceptions\WrongKeyTypeException
	 */
	public function hasChildWithWrongType2(Node $node) {
		$node->hasChild(array());
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::hasChild
	 * @depends	construct
	 * 
	 * @expectedException Ci\UtilityBundle\Exceptions\WrongKeyTypeException
	 */
	public function hasChildWithWrongType3(Node $node) {
		$node->hasChild(new \stdClass());
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::hasChild
	 * @depends	construct
	 * 
	 * @expectedException Ci\UtilityBundle\Exceptions\WrongKeyTypeException
	 */
	public function hasChildWithWrongType4(Node $node) {
		$node->hasChild(false);
	}
	
	/**
	 * @test
	 * @group	small
	 * @covers	::hasChild
	 * @depends	construct
	 * 
	 * @expectedException Ci\UtilityBundle\Exceptions\WrongKeyTypeException
	 */
	public function hasChildWithWrongType5(Node $node) {
		$node->hasChild(null);
	}
}