<?php
namespace ArminVieweg\Dce\ViewHelpers\Format;

/*  | This extension is part of the TYPO3 project. The TYPO3 project is
 *  | free software and is licensed under GNU General Public License.
 *  |
 *  | (c) 2012-2015 Armin Ruediger Vieweg <armin@v.ieweg.de>
 */

/**
 * Addcslashes Viewhelper
 *
 * @package ArminVieweg\Dce
 */
class AddcslashesViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
	/**
	 * Add slashes to a given string using the php function "addcslashes".
	 *
	 * @param string $subject To add slashes to
	 * @param string $charlist A list of characters to be escaped
	 * @return string with slashes
	 * @see http://www.php.net/manual/function.addcslashes.php
	 */
	public function render($subject = NULL, $charlist = "'") {
		if ($subject === NULL) {
			$subject = $this->renderChildren();
		}
		return addcslashes($subject, $charlist);
	}
}