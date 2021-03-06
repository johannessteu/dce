<?php
namespace ArminVieweg\Dce\Controller;

/*  | This extension is part of the TYPO3 project. The TYPO3 project is
 *  | free software and is licensed under GNU General Public License.
 *  |
 *  | (c) 2012-2015 Armin Ruediger Vieweg <armin@v.ieweg.de>
 */

/**
 * DCE Module Controller
 * Provides the backend DCE module, for faster and easier access to DCEs.
 *
 * @package ArminVieweg\Dce
 */
class DceModuleController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * @var \ArminVieweg\Dce\Domain\Repository\DceRepository
	 * @inject
	 */
	protected $dceRepository;


	/**
	 * Index Action
	 *
	 * @return void
	 */
	public function indexAction() {
		$extConfiguration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['dce']);
		$enableUpdateCheck = (bool) $extConfiguration['enableUpdateCheck'];

		$this->view->assign('dces', $this->dceRepository->findAllAndStatics());
		$this->view->assign('enableUpdateCheck', $enableUpdateCheck);
	}
}