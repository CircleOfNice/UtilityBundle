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
 * test case for Query
 */
namespace Circle\UtilityBundle\Tests\Queue;

use Circle\UtilityBundle\Queue\ImmutableQueue;

/**
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\Tests\Queue
 * @copyright	TeeAge-Beatz UG 2013-2014
 * @internal
 * 
 * @coversDefaultClass	Circle\UtilityBundle\Queue\ImmutableQueue
 * @uses				Circle\UtilityBundle\Queue\ImmutableQueue
 * 
 * @SuppressWarnings("PHPMD.StaticAccess");
 */
class ImmutableQueueTest extends \PHPUnit_Framework_TestCase {
	public function createOne($values) {
		return new ImmutableQueue($values);
	}
	
	/**
	 * @test
	 * @covers	::__construct
	 */	
	public function construct() {
		$this->assertInstanceOf("Circle\UtilityBundle\Queue\Queue", $this->createOne(array("test")));
		return $this->createOne(explode("\\", "Class\Ci\AnnotationBundle"));
	}
	
	/**
	 * @test
	 * @covers	::isEmpty
	 * @depends	construct
	 */
	public function isEmptyFalse(ImmutableQueue $queue) {
		$this->assertFalse($queue->isEmpty());
		return $queue;
	}
	
	/**
	 * @test
	 * @covers	::head
	 * @depends	isEmptyFalse
	 */
	public function head(ImmutableQueue $queue) {
		$this->assertEquals("Class", $queue->head());
		$this->assertEquals("Class", $queue->head());
		return $queue;
	}
	
	/**
	 * @test
	 * @covers	::tail
	 * @depends	head
	 */
	public function tail(ImmutableQueue $queue) {
		$queue = $queue->tail();
		$this->assertEquals($this->createOne(explode("\\", "Ci\AnnotationBundle")), $queue);
		$this->assertEquals("Ci", $queue->head());
		$queue = $queue->tail();
		$this->assertEquals($this->createOne(explode("\\", "AnnotationBundle")), $queue);
		$this->assertEquals("AnnotationBundle", $queue->head());
		$queue = $queue->tail();
		return $queue;
	}
	
	/**
	 * @test
	 * @covers	::isEmpty
	 * @depends	tail
	 */
	public function isEmptyTrue(ImmutableQueue $queue) {
		$this->assertTrue($queue->isEmpty());
		$this->assertEquals($this->createOne(array()), $queue);
		$this->assertNotNull($queue->head());
		$this->assertNotNull($queue->head());
		$this->assertEquals($this->createOne(array()), $queue->tail());
		$this->assertEquals($this->createOne(array()), $queue->tail());
	}
	
	/**
	 * @test
	 * @covers	::__toString
	 * @depends	construct
	 */
	public function toStringTest(ImmutableQueue $queue) {
		$this->assertEquals("Queue('Class', 'Ci', 'AnnotationBundle')\n", $queue."");
	}
	
	/**
	 * @test
	 * @covers	::reduce
	 * @depends	construct
	 */
	public function reduce(ImmutableQueue $queue) {
		$this->assertEquals("Class\Ci\AnnotationBundle", $queue->reduce("\\"));
	}
}