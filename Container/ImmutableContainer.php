<?php
/**
 * immutable container
 */
namespace Circle\UtilityBundle\Container;

use Circle\UtilityBundle\Interfaces\Container;
use Doctrine\Common\Collections\ArrayCollection;
use Circle\UtilityBundle\Exceptions\Exceptions;

/**
 * implementation of container, that takes an array in its
 * constructor and sets all values of this
 *
 * @package   Circle\UtilityBundle
 * @author    Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @copyright 2014 TeeAge-Beatz UG (haftungsbeschraenkt)
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 */
final class ImmutableContainer implements Container {
	use Exceptions;

	/**
	 * @var	ArrayCollection stores the values of this container
	 */
	private $collection;

	/**
	 * constructor takes an array to set all values
	 *
	 * @param  array $array
	 * @return ImmutableContainer
	 */
	public function __construct(array $array) {
		$this->collection = new ArrayCollection($array);
	}

	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Interfaces\Container::get()
	 *
	 * @param  string $key
	 * @return mixed
	 */
	public function get($key) {
		return $this->has($key) ? $this->collection->get($key) : $this->_noKeyException($key);
	}

	/**
	 * (non-PHPdoc)
	 * @see \Circle\UtilityBundle\Interfaces\Container::toArray()
	 */
	public function toArray() {
		return $this->collection->toArray();
	}

	/**
	 * checks if $key exists
	 *
	 * @param  string $key
	 * @return boolean
	 */
	private function has($key) {
		return $this->collection->get($key) !== null;
	}
}
