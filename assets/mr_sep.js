/*
 * @package    Editors-XTD - Automatic mobile spoiler  Plugin
 * @version    1.0.0
 * @author     JoomlaNet - joomlanet.ru
 * @copyright  Copyright (c) 2017 - 2017 JoomlaNet. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @link       https://joomlanet.ru
 */

window.insertAddMobileReadmore = function (editor) {
	"use strict";
	if (!Joomla.getOptions('xtd-mobilereadmore')) {

		return false;
	}
	var content, options = window.Joomla.getOptions('xtd-mobilereadmore');

	if (window.Joomla && window.Joomla.editors && window.Joomla.editors.instances &&
		window.Joomla.editors.instances.hasOwnProperty(editor)) {
		content = window.Joomla.editors.instances[editor].getValue();
	} else {
		content = (new Function('return ' + options.editor))();
	}
	if (content.match(/<hr\s+id=("|')system-mobilereadmore("|')\s*\/*>/i)) {
		alert(options.exists);
		return false;
	} else {
		if (window.Joomla && window.Joomla.editors && window.Joomla.editors.instances &&
			window.Joomla.editors.instances.hasOwnProperty(editor)) {
			window.Joomla.editors.instances[editor].replaceSelection('<hr id="system-mobilereadmore" />');
		} else {
			window.jInsertEditorText('<hr id="system-mobilereadmore" />', editor);
		}
	}
};

function mrHR() {

	(function ($) {

		if (!Joomla.getOptions('xtd-mobilereadmore')) {

			return false;
		}
		var content, options = window.Joomla.getOptions('xtd-mobilereadmore');
		var iframe = $('#' + options.name + '_ifr');
		if (iframe.length > 0) {
			clearInterval(addmr);
			var $head = $(iframe).contents().find("head");
			$head.append($("<link/>",
				{rel: "stylesheet", href: "/plugins/editors-xtd/mobilereadmore/assets/mr_sep.css", type: "text/css"}));
		}

	})(jQuery);
}

var addmr = setInterval(mrHR, 1000);


