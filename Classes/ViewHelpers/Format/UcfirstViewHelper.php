<?php
namespace ArminVieweg\Dce\ViewHelpers\Format;

/*  | This extension is part of the TYPO3 project. The TYPO3 project is
 *  | free software and is licensed under GNU General Public License.
 *  |
 *  | (c) 2012-2015 Armin Ruediger Vieweg <armin@v.ieweg.de>
 */

/**
 * Make a string's first character uppercase
 *
 * @package ArminVieweg\Dce
 */
class UcfirstViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
	/**
	 * Make a string's first character uppercase
	 *
	 * @param string $subject To make first character uppercase
	 * @return string with first uppercase letter
	 * @see http://php.net/manual/de/function.ucfirst.php
	 */
	public function render($subject = NULL) {
		if ($subject === NULL) {
			$subject = $this->renderChildren();
		}
		return ucfirst($subject);
	}
}