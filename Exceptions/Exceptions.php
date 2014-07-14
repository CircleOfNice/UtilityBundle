<?php
/**
 * trait to throw exceptions
 */
namespace Ci\UtilityBundle\Exceptions;

/**
 * trait with a private function for every bundles exception.
 * this is used to encapsulate the instantiation of the
 * exceptions in one place.
 *
 * @package   Ci\UtilityBundle
 * @author    Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @copyright 2014 TeeAge-Beatz UG (haftungsbeschraenkt)
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @internal
 *
 * @SuppressWarnings("PHPMD.StaticAccess")
 */
trait Exceptions {
	/**
	 *
	 * throws a NoKeyException
	 *
	 * @param	string												$key
	 * @throws	Ci\UtilityBundle\Exceptions\NoKeyException
	 * @return	void
	 */
	private function _noKeyException($key) {
			throw new NoKeyException($key, $this);
	}

	/**
	 *
	 * throws a WrongKeyTypeException
	 *
	 * @param	object												$key
	 * @param	string												$expected
	 * @throws	Ci\UtilityBundle\Exceptions\WrongKeyTypeException
	 * @return	void
	 */
	private function _wrongKeyTypeException($key, $expected) {
		throw new WrongKeyTypeException($key, $expected);
	}

	/**
	 *
	 * throws an ImmutableException
	 *
	 * @param	string												$key
	 * @throws	Ci\UtilityBundle\Exceptions\ImmutableException
	 */
	private function _immutableException($key) {
		throw new ImmutableException($key);
	}

	/**
	 *
	 * throws a NotInitializedException
	 *
	 * @param	object												$class
	 * @param	string												$method
	 * @throws	Ci\UtilityBundle\Exceptions\NotInitializedException
	 */
	private function _notInitializedException($class, $method) {
		throw new NotInitializedException($class, $method);
	}

	/**
	 *
	 * throws WrongTypeException
	 *
	 * @param	string												$name
	 * @param	object												$param
	 * @param	string												$expected
	 * @throws	Ci\UtilityBundle\Exceptions\WrongTypeException
	 */
	private function _wrongTypeException($name, $param, $expected) {
		throw new WrongTypeException($name, $param, $expected);
	}
}