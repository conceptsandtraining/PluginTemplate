<?php
include_once("./Services/UIComponent/classes/class.ilUIHookPluginGUI.php");

/**
 * Plugin object GUI class. Manipulates the output at every page call
 */
class ilObj<PLUGINNAME>UIHookGUI  extends ilUIHookPluginGUI {
	/**
	 * Called bevore html output get started
	 * Manipulate the html output string
	 *
	 * @inheritdoc
	 */
	function getHTML($a_comp, $a_part, $a_par = array()) {

		return array
			( "mode" => ilUIHookPluginGUI::APPEND
			, "html" => $html
			);

	}

	/**
	 * Modify a GUI in ILIAS. Only usable for tabs or subtabs.
	 *
	 * @inheritdoc
	 */
	function modifyGUI($a_comp, $a_part, $a_par = array()) {
	}
}