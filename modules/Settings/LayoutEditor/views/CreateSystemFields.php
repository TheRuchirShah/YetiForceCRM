<?php

/**
 * Create system fields modal view file.
 *
 * @package   Settings.View
 *
 * @copyright YetiForce Sp. z o.o
 * @license   YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */
/**
 * Create system fields modal view class.
 */
class Settings_LayoutEditor_CreateSystemFields_View extends \App\Controller\ModalSettings
{
	/** {@inheritdoc} */
	protected $pageTitle = 'LBL_ADD_SYSTEM_FIELD';

	/** {@inheritdoc} */
	public $successBtn = 'LBL_ADD';

	/** {@inheritdoc} */
	public $modalIcon = 'fas fa-plus';

	/** {@inheritdoc} */
	public function process(App\Request $request)
	{
		$moduleModel = Settings_LayoutEditor_Module_Model::getInstanceByName($request->getByType('sourceModule', 'Alnum'));
		$viewer = $this->getViewer($request);
		// $viewer->assign('FIELDS_EXISTS', $instance->getFields());
		// $viewer->assign('MODULE_MODELS', $instance->getFieldsTypes());
		$viewer->assign('FIELDS', $moduleModel->getMissingSystemFields());
		$viewer->view('CreateSystemFields.tpl', $request->getModule(false));
	}
}