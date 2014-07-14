<?php
/**
 * thrown if a value is not a key
 */
namespace Ci\UtilityBundle\Exceptions;

use Ci\UtilityBundle\Traits\DebugPrinter;

/**
 *
 * @package   Ci\UtilityBundle
 * @author    Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @copyright 2014 TeeAge-Beatz UG (haftungsbeschraenkt)
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @internal
 */
class NoKeyException extends \Exception {
	use DebugPrinter;

	/**
	 * sets the message of the exception
	 *
	 * @param	string	$key
	 * @param	mixed	$value
	 */
	public function __construct($key, $value) {
		$this->message = "key '".$key."' does not exist on '".$this->_toDebugString($value);
	}
}