<?php

/*  | This extension is part of the TYPO3 project. The TYPO3 project is
 *  | free software and is licensed under GNU General Public License.
 *  |
 *  | (c) 2012-2015 Armin Ruediger Vieweg <armin@v.ieweg.de>
 */

/**
 * Access check hook
 * To allow edit not existing DCE entries (static DCEs)
 *
 * @package ArminVieweg\Dce
 */
class tx_accessCheck {

	/**
	 * Returns TRUE if requested record is a static DCE
	 *
	 * @param array $params
	 * @return bool
	 */
	public function checkAccess(array $params) {
		if (is_numeric($params['uid'])) {
			return $params['hasAccess'];
		}
		return $params['table'] === 'tx_dce_domain_model_dce' && strpos($params['uid'], 'dce_') === 0;
	}

}