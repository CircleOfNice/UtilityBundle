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
 * generic implementation of Node
 */
namespace Circle\UtilityBundle\MultiChildTree;

use Circle\UtilityBundle\Tree\Node as NodeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Circle\UtilityBundle\Exceptions\Exceptions;
use Circle\UtilityBundle\Interfaces\DeepPrintable;
use Circle\UtilityBundle\Traits\DebugPrinter;

/**
 * a class that implements a generic version of a node
 * for a very generic multichildtree. extending classes
 * need to implement a way in which the actual information
 * is stored. this class handles only the problems necessary
 * to build a tree.
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\MultiChildTree
 * @copyright	TeeAge-Beatz UG 2014
 */
abstract class Node implements NodeInterface, DeepPrintable {
	use Exceptions;
	use DebugPrinter;
	
	/**
	 * @var	Doctrine\Common\Collections\ArrayCollection	saves all children of this node
	 */
	private $children;
	
	/**
	 * @var	Circle\UtilityBundle\Tree\Node					saves the parent
	 */
	private $parent;
	
	/**
	 * constructor initializes the children list
	 * 
	 * @SuppressWarnings("PHPMD.StaticAccess");
	 */
	public function __construct() {
		$this->children = new ArrayCollection();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Tree\Node::addChild()
	 * 
	 * @param	string										$key
	 */
	final public function addChild($key, NodeInterface $node) {
		//children should be immutable, silent return because 
		//an error causes more ifs
		if($this->hasChild($key)) return $this;
		$node->setParent($this);
		$this->children->set($key, $node);
		return $this;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Tree\Node::hasChild()
	 * 
	 * @param	string										$key
	 */
	final public function hasChild($key) {
		if(!is_string($key)) $this->_wrongKeyTypeException($key, "string");
		return $this->getChildPriv($key) !== null;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Tree\Node::getParent()
	 */
	final public function getParent() {
		return $this->parent;
	}
	
	/**
	 * sets the parent
	 * 
	 * @param	Circle\UtilityBundle\Tree\Node
	 * @return	$this
	 */
	final private function setParent(NodeInterface $parent) {
		$this->parent = $parent;
		return $this;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Tree\Node::getChild()
	 * 
	 * @param	string										$key
	 * @return	Circle\UtilityBundle\Tree\Node
	 */
	final public function getChild($key) {
		return !$this->hasChild($key) ? $this->_noKeyException($key) : $this->getChildPriv($key);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Tree\Node::getAllChildren()
	 * 
	 * @return	Doctrine\Common\Collections\ArrayCollection
	 */
	final public function getAllChildren(ArrayCollection $arrayCollection) {
		$arrayCollection->add($this);
		foreach($this->children as $child) $child->getAllChildren($arrayCollection);
		return $arrayCollection;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Interfaces\Printable::toString()
	 * 
	 * @return	string
	 */
	final public function __toString() {
		return $this->toStringDeep();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Interfaces\DeepPrintable::toStringFlat()
	 * 
	 * @return	string
	 */
	public function toStringFlat() {
		return "°Node()\n";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Interfaces\DeepPrintable::toStringDeep()
	 * 
	 * @param	string										$tabs
	 * @return	string
	 */
	public function toStringDeep($tabs = "") {
		return $this->_toStringDeep($this->children->toArray(), $tabs);
	}
	
	/**
	 * 
	 * returns the child at position $key
	 * 
	 * @param	string										$key
	 * @return	Circle\UtilityBundle\Tree\Node
	 */
	private function getChildPriv($key) {
		return $this->children->get($key);
	}
}