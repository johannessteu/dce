<?php
namespace ArminVieweg\Dce\Utility;

/*  | This extension is part of the TYPO3 project. The TYPO3 project is
 *  | free software and is licensed under GNU General Public License.
 *  |
 *  | (c) 2012-2015 Armin Ruediger Vieweg <armin@v.ieweg.de>
 */
use TYPO3\CMS\Fluid\View\AbstractTemplateView;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Fluid Template Utility
 *
 * @package ArminVieweg\Dce
 */
class FluidTemplate {
	/** @var string	 */
	const DEFAULT_DIRECTORY_LAYOUTS = 'EXT:dce/Resources/Private/Layouts/';

	/** @var string	 */
	const DEFAULT_DIRECTORY_PARTIALS = 'EXT:dce/Resources/Private/Partials/';

	/**
	 * @var \TYPO3\CMS\Fluid\View\StandaloneView
	 */
	protected $fluidTemplate = NULL;

	/**
	 * @var array with temporary files
	 */
	protected $temporaryFiles = array();

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Initializes the fluid template utility
	 *
	 * @return void
	 */
	protected function init() {
		// Add extbase_object to cacheConfigurations
		$cacheConfigurations = array_merge(
			$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'],
			array('extbase_object' => array())
		);
		GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Cache\\CacheManager')->setCacheConfigurations($cacheConfigurations);

		\ArminVieweg\Dce\Utility\DatabaseUtility::getDatabaseConnection();

		$this->fluidTemplate = GeneralUtility::makeInstance('TYPO3\CMS\Fluid\View\StandaloneView');
		$this->fluidTemplate->setLayoutRootPath(GeneralUtility::getFileAbsFileName(self::DEFAULT_DIRECTORY_LAYOUTS));
		$this->fluidTemplate->setPartialRootPath(GeneralUtility::getFileAbsFileName(self::DEFAULT_DIRECTORY_PARTIALS));
	}

	/**
	 * Loads the template source and render the template.
	 *
	 * @param string $actionName If set, the view of the specified action will
	 *                           be rendered instead.
	 *        Default is the action specified in the Request object
	 * @return string Rendered Template
	 */
	public function render($actionName = NULL) {
		return $this->fluidTemplate->render($actionName);
	}

	/**
	 * Assign a value to the variable container.
	 *
	 * @param string $key The key of a view variable to set
	 * @param mixed $value The value of the view variable
	 * @return AbstractTemplateView the instance of this view to allow chaining
	 */
	public function assign($key, $value) {
		return $this->fluidTemplate->assign($key, $value);
	}

	/**
	 * Sets the absolute path to a Fluid template file
	 *
	 * @param string $templatePathAndFilename Fluid template path
	 * @return void
	 */
	public function setTemplatePathAndFilename($templatePathAndFilename) {
		$this->fluidTemplate->setTemplatePathAndFilename($templatePathAndFilename);
	}

	/**
	 * Sets the Fluid template source
	 *
	 * @param string $templateSource Fluid template source code
	 * @return void
	 */
	public function setSource($templateSource) {
		$this->fluidTemplate->setTemplateSource($templateSource);
	}

	/**
	 * Set the root path to the layouts.
	 * If set, overrides the one determined from $this->layoutRootPathPattern
	 *
	 * @param string $layoutRootPath Root path to the layouts. If set, overrides
	 *                               the one determined from
	 *                               $this->layoutRootPathPattern
	 * @return void
	 */
	public function setLayoutRootPath($layoutRootPath) {
		$this->fluidTemplate->setLayoutRootPath($layoutRootPath);
	}

	/**
	 * Sets the absolute path to the folder that contains Fluid partial files.
	 *
	 * @param string $partialRootPath Fluid partial root path
	 * @return void
	 */
	public function setPartialRootPath($partialRootPath) {
		$this->fluidTemplate->setPartialRootPath($partialRootPath);
	}

}