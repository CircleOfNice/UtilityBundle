<?php
/**
 * thrown if a query string has the wrong format
 */
namespace Circle\UtilityBundle\Exceptions;

/**
 * @package   Circle\UtilityBundle
 * @author    Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @copyright 2014 TeeAge-Beatz UG (haftungsbeschraenkt)
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @internal
 */
class ImmutableException extends \Exception {
	/**
	 * sets the message of the exception
	 *
	 * @param	string	$key
	 */
	public function __construct($key) {
		$this->message = "trying to access immutable property '".$key."', which was already set.";
	}
}