<?php
/**
 * @package    Button - Automatic mobile spoiler
 * @version    1.0.0
 * @author     Joomlanet - joomlanet.ru
 * @copyright  Copyright (c) 2016 - 2017  Joomlanet. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @link       https://joomlanet.ru
 */

defined('_JEXEC') or die;

class plgEditorsXTDMobileReadmoreInstallerScript
{
	function install(JAdapterInstance $adapter)
	{
		$app  = JFactory::getApplication();
		$msg  = JText::_('PLG_EDITORS-XTD_MOBILEREADMORE_PUBLISHED');
		$type = JText::_('PLG_EDITORS-XTD_MOBILEREADMORE_PUBLISHED_TITLE');;
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true)
			->select('extension_id')
			->from($db->quoteName('#__extensions'))
			->where($db->quoteName('type') . ' = ' . $db->quote('plugin'))
			->where($db->quoteName('element') . ' = ' . $db->quote('mobilereadmore'))
			->where($db->quoteName('folder') . ' = ' . $db->quote('editors-xtd'));
		$db->setQuery($query);
		$plugin          = $db->loadObject();
		$plugin->state   = 0;
		$plugin->enabled = 1;
		try
		{
			$db->updateObject('#__extensions', $plugin, 'extension_id');
		}
		catch (RuntimeException $e)
		{
			$msg = $e->getMessage();
			$app->enqueueMessage($msg, 'error');
			$msg  = JText::_('PLG_EDITORS-XTD_MOBILEREADMORE_NOPUBLISHED');
			$type = 'error';
		}

		$app->enqueueMessage($msg, $type);

		return true;
	}
}