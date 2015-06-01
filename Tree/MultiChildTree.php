<?php
/**
 * generic implementation of a tree
 */
namespace Circle\UtilityBundle\Tree;

use Circle\UtilityBundle\Interfaces\GenericType;
use Circle\UtilityBundle\Interfaces\Vector;
use Circle\UtilityBundle\Interfaces\Branchable;
use Circle\UtilityBundle\Interfaces\Printable;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * this is a very generic implementation of a 
 * MultichildTree, where the positions of the
 * children are defined by vectors.s
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\Tree
 * @copyright	TeeAge-Beatz UG 2014
 */
abstract class MultiChildTree implements Tree, Branchable, Printable {
	/**
	 * @var	Circle\UtilityBundle\Tree\RootNode saves the root of this tree
	 */
	private $root;
	
	/**
	 * initializes the tree with a RootNode
	 * 
	 * @param Circle\UtilityBundle\Tree\RootNode		$root
	 */
	final public function __construct(RootNode $root) {
		$this->root	= $root;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Interfaces\Branchable::add()
	 */
	public function add(Vector $path, GenericType $node) {
		$this->getPriv($path)->addChild($path->last(), $node);
		return $this;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Interfaces\Branchable::get()
	 */
	public function get(Vector $path) {
		return $this->getPriv($path)->getChild($path->last());
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Tree\Tree::getNodes()
	 */
	final public function getNodes() {
		return $this->root()->getAllChildren(new ArrayCollection());
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Interfaces\Branchable::getAll()
	 */
	final public function getAll() {
		return $this->getNodes();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Interfaces\Printable::__toString()
	 */
	final public function __toString() {
		return $this->root->__toString();
	}
	
	/**
	 * returns the root node of this tree
	 * 
	 * @return	Circle\UtilityBundle\Tree\RootNode
	 */
	final protected function root() {
		return $this->root;
	}
	
	/**
	 * wrapper for getPrivRec
	 * 
	 * @param	Circle\UtilityBundle\Interfaces\Vector	$path
	 * @return	Circle\UtilityBundle\Tree\Node
	 */
	private function getPriv(Vector $path) {
		return $this->getPrivRec($this->root, $path->tail());
	}
	
	/**
	 * returns a child at the position that is defined
	 * by the vector. works recursively
	 * 
	 * @param	Circle\UtilityBundle\Tree\Node			$current
	 * @param	Circle\UtilityBundle\Interfaces\Vector	$path
	 * @return	Circle\UtilityBundle\Tree\Node
	 */
	private function getPrivRec(Node $current, Vector $path) {
		if($path->isEmpty()) return $current;
		return $this->getPrivRec($current->getChild($path->head()), $path->tail());
	}
}