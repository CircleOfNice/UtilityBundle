<?php
/**
 * thrown if an argument has the wrong type
 */
namespace Ci\UtilityBundle\Exceptions;

use Ci\UtilityBundle\Traits\DebugPrinter;

/**
 * @package   Ci\UtilityBundle
 * @author    Marco Sliwa <marco.sliwa@teeage-beatz.de>
 * @copyright 2014 TeeAge-Beatz UG (haftungsbeschraenkt)
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @internal
 */
class WrongTypeException extends \Exception {
	use DebugPrinter;

	/**
	 * constructor
	 *
	 * @param	string	$name
	 * @param	object	$param
	 * @param	string	$expected
	 */
	public function __construct($name, $param, $expected) {
		$this->message = "the parameter '\$".$name."(".$this->_toDebugString($param).")' is of type '".$this->_getType($param)."', ".$expected." expected!";
	}
}