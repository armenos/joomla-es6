<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_modules
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
namespace Joomla\Component\Modules\Administrator\Field;

defined('JPATH_BASE') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Form\FormHelper;

\JLoader::register('ModulesHelper', JPATH_ADMINISTRATOR . '/components/com_modules/helpers/modules.php');

FormHelper::loadFieldClass('list');

/**
 * Modules Position field.
 *
 * @since  3.4.2
 */
class ModulesPositionField extends \JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  3.4.2
	 */
	protected $type = 'ModulesPosition';

	/**
	 * Method to get the field options.
	 *
	 * @return  array  The field option objects.
	 *
	 * @since   3.4.2
	 */
	public function getOptions()
	{
		$clientId = Factory::getApplication()->input->get('client_id', 0, 'int');
		$options  = \ModulesHelper::getPositions($clientId);

		return array_merge(parent::getOptions(), $options);
	}
}
