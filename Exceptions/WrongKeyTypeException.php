<?php
/**
 * thrown if a key has the wrong type
 */
namespace Ci\UtilityBundle\Exceptions;

/**
 * @package   Ci\UtilityBundle
 * @author    Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @copyright 2014 TeeAge-Beatz UG (haftungsbeschraenkt)
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @internal
 */
class WrongKeyTypeException extends WrongTypeException {
	/**
	 * constructor
	 *
	 * @param	object	$key
	 * @param	string	$expected
	 *
	 * @SuppressWarnings("PHPMD.StaticAccess")
	 */
	public function __construct($key, $expected) {
		parent::__construct("key", $key, $expected);
	}
}