<?php
/**
 * exception should be thrown if not everything needed
 * to perform an operation is initialized in a class or
 * object
 */
namespace Circle\UtilityBundle\Exceptions;

/**
 *
 * @package   Circle\UtilityBundle
 * @author    Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @copyright 2014 TeeAge-Beatz UG (haftungsbeschraenkt)
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @internal
 */
class NotInitializedException extends \Exception {
	/**
	 * sets the message
	 *
	 * @param	object	$message
	 * @param	string	$method
	 */
	public function __construct($class, $method) {
		$this->message = get_class($class)." is not initialized, please call '".$method."' before using this class!";
	}
}