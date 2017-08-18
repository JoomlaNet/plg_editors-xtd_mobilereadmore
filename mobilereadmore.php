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

class plgButtonMobileReadmore extends JPlugin
{
	protected $autoloadLanguage = true;

	function onDisplay($name)
	{
		$doc = JFactory::getDocument();
		JHtml::_('jquery.framework');
		$doc->addScript('/plugins/editors-xtd/mobilereadmore/assets/mr_sep.js');
		$doc->addStyleSheet('/plugins/editors-xtd/mobilereadmore/assets/mr_sep.css');
		$doc->addScriptOptions(
			'xtd-mobilereadmore',
			array(
				'editor' => $this->_subject->getContent($name),
				'exists' => JText::_('PLG_EDITORS-XTD_MOBILEREADMORE_ALREADY_EXISTS', true),
				'name'   => $name,
			)
		);

		$button          = new JObject;
		$button->modal   = false;
		$button->class   = 'btn btn-info';
		$button->onclick = 'insertAddMobileReadmore(\'' . $name . '\');return false;';
		$button->text    = JText::_('PLG_EDITORS-XTD_MOBILEREADMORE_BUTTON');
		$button->name    = 'arrow-down-4';
		$button->link    = '#';

		return $button;
	}
}
