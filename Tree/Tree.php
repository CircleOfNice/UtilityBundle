<?php
/**
 * tree interface
 */
namespace Ci\UtilityBundle\Tree;

/**
 * tree interface
 *
 * @author		Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @package		Ci\UtilityBundle\Tree
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