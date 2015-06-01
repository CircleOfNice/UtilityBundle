<?php
/**
 * tree interface
 */
namespace Circle\UtilityBundle\Tree;

/**
 * tree interface
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Circle\UtilityBundle\Tree
 * @copyright	TeeAge-Beatz UG 2014
 */
interface Tree {
	/**
	 * 
	 * returns all Nodes of this tree as an ArrayCollection
	 * 
	 * @return	Doctrine\Common\Collections\ArrayCollection
	 */
	public function getNodes();
}