<?php
namespace ArminVieweg\Dce\ViewHelpers;

/*  | This extension is part of the TYPO3 project. The TYPO3 project is
 *  | free software and is licensed under GNU General Public License.
 *  |
 *  | (c) 2012-2015 Armin Ruediger Vieweg <armin@v.ieweg.de>
 */

/**
 * GP viewhelper which returns get or post variables using _GP method of
 * TYPO3\CMS\Core\Utility\GeneralUtility.
 *
 * Never use this viewhelper for direct output!!
 * This would provoke XSS (Cross site scripting).
 *
 * @package ArminVieweg\Dce
 */
class GPViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * Returns get or post variable by given subject
	 *
	 * @param string $subject Name of variable to get
	 * @return string Value of requested get or post variable.
	 *                Don't output it directly! (XSS risk)
	 */
	public function render($subject = NULL) {
		if ($subject === NULL) {
			$subject = $this->renderChildren();
		}

		return \TYPO3\CMS\Core\Utility\GeneralUtility::_GP($subject);
	}
}