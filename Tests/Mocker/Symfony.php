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
 * mocker for symfony classes
*/
namespace Ci\UtilityBundle\Tests\Mocker;

/**
 * mocker for symfony classes
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Ci\AnnotatableBundle\Tests\Mocker
 * @copyright	TeeAge-Beatz UG 2013-2014
 * @internal
 *
 * @SuppressWarnings("PHPMD.StaticAccess")
 */
trait Symfony {
	/**
	 * mocks a controller
	 *
	 * @param	$className
	 * @return	Symfony\Bundle\FrameworkBundle\Controller\Controller
	 */
	protected function mockController($className) {
		$mock = $this->getMockBuilder("Symfony\Bundle\FrameworkBundle\Controller\Controller")
		->setMockClassName($className)
		->getMock();
		return $mock;
	}
	
	/**
	 * mocker for FileCacheReader
	 *
	 * @param	string	$classToRead
	 * @param	array	$annotations
	 * @return	Doctrine\Common\Annotations\FileCacheReader
	 */
	private function mockFileCacheReader($classToRead, array $annotations = array()) {
		$mock = $this->getMockBuilder("Doctrine\Common\Annotations\FileCacheReader")
		->disableOriginalConstructor()
		->getMock();
	
		$mock->expects($this->any())
		->method("getClassAnnotations")
		->with($this->equalTo(new \ReflectionClass($classToRead)))
		->will($this->returnValue($annotations));
	
		return $mock;
	}
	
	/**
	 * mocks a FilterControllerEvent
	 * 
	 * @param	array	$controllers
	 * @return	Symfony\Component\HttpKernel\Event\FilterControllerEvent
	 */
	private function mockFilterControllerEvent(array $controllers) {
		$mock = $this->getMockBuilder("Symfony\Component\HttpKernel\Event\FilterControllerEvent")
		->disableOriginalConstructor()
		->getMock();
	
		$mock->expects($this->once())
		->method("getController")
		->will($this->returnValue($controllers));
	
		return $mock;
	}
}