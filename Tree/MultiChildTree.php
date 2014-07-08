<?php
/**
 * generic implementation of a tree
 */
namespace Ci\UtilityBundle\Tree;

use Ci\UtilityBundle\Interfaces\GenericType;
use Ci\UtilityBundle\Interfaces\Vector;
use Ci\UtilityBundle\Interfaces\Branchable;
use Ci\UtilityBundle\Interfaces\Printable;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * this is a very generic implementation of a 
 * MultichildTree, where the positions of the
 * children are defined by vectors.s
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Ci\UtilityBundle\Tree
 * @copyright	TeeAge-Beatz UG 2014
 */
abstract class MultiChildTree implements Tree, Branchable, Printable {
	/**
	 * @var	Ci\UtilityBundle\Tree\RootNode saves the root of this tree
	 */
	private $root;
	
	/**
	 * initializes the tree with a RootNode
	 * 
	 * @param Ci\UtilityBundle\Tree\RootNode		$root
	 */
	final public function __construct(RootNode $root) {
		$this->root	= $root;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Ci\UtilityBundle\Interfaces\Branchable::add()
	 */
	public function add(Vector $path, GenericType $node) {
		$this->getPriv($path)->addChild($path->last(), $node);
		return $this;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Ci\UtilityBundle\Interfaces\Branchable::get()
	 */
	public function get(Vector $path) {
		return $this->getPriv($path)->getChild($path->last());
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Ci\UtilityBundle\Tree\Tree::getNodes()
	 */
	final public function getNodes() {
		return $this->root()->getAllChildren(new ArrayCollection());
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Ci\UtilityBundle\Interfaces\Branchable::getAll()
	 */
	final public function getAll() {
		return $this->getNodes();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Ci\UtilityBundle\Interfaces\Printable::__toString()
	 */
	final public function __toString() {
		return $this->root->__toString();
	}
	
	/**
	 * returns the root node of this tree
	 * 
	 * @return	Ci\UtilityBundle\Tree\RootNode
	 */
	final protected function root() {
		return $this->root;
	}
	
	/**
	 * wrapper for getPrivRec
	 * 
	 * @param	Ci\UtilityBundle\Interfaces\Vector	$path
	 * @return	Ci\UtilityBundle\Tree\Node
	 */
	private function getPriv(Vector $path) {
		return $this->getPrivRec($this->root, $path->tail());
	}
	
	/**
	 * returns a child at the position that is defined
	 * by the vector. works recursively
	 * 
	 * @param	Ci\UtilityBundle\Tree\Node			$current
	 * @param	Ci\UtilityBundle\Interfaces\Vector	$path
	 * @return	Ci\UtilityBundle\Tree\Node
	 */
	private function getPrivRec(Node $current, Vector $path) {
		if($path->isEmpty()) return $current;
		return $this->getPrivRec($current->getChild($path->head()), $path->tail());
	}
}