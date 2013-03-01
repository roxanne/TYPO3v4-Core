<?php
namespace TYPO3\CMS\Install;

/*                                                                        *
 * This script belongs to the TYPO3 Flow framework.                       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\CMS\Core\Package\Package as BasePackage;

/**
 * The TYPO3 Flow Package
 *
 */
class Package extends BasePackage {

	/**
	 * @var bool
	 */
	protected $objectManagementEnabled = TRUE;

	/**
	 * @var array
	 */
	protected $ignoredClassNames = array(
		'TYPO3\\CMS\\Install\\Interfaces\\CheckTheDatabaseHook',
		'TYPO3\\CMS\\Install\\Service\\BasicService',
		'TYPO3\\CMS\\Install\\Updates\\Base',
		'TYPO3\\CMS\\Install\\Updates\\File\\FilemountUpdateWizard',
		'TYPO3\\CMS\\Install\\Updates\\File\\InitUpdateWizard',
		'TYPO3\\CMS\\Install\\Updates\\File\\TceformsUpdateWizard',
		'TYPO3\\CMS\\Install\\Updates\\File\\TtContentUploadsUpdateWizard',
	);

	/**
	 * Invokes custom PHP code directly after the package manager has been initialized.
	 *
	 * @param \TYPO3\Flow\Core\Bootstrap $bootstrap The current bootstrap
	 * @return void
	 */
	public function boot(\TYPO3\Flow\Core\Bootstrap $bootstrap) {
		$bootstrap->registerRequestHandler(new \TYPO3\CMS\Install\InstallRequestHandler($bootstrap));
	}
}

?>
