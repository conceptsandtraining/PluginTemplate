<?php
include_once("./Services/Repository/classes/class.ilUserInterfaceHookPlugin.php");

/**
 * Plugin base class. Keeps all information the plugin needs
 */
class il<PLUGINNAME>Plugin extends ilUserInterfaceHookPlugin {
	/**
	 * Get the name of the Plugin
	 *
	 * @return string
	 */
	function getPluginName() {
		return "<PLUGINNAME>";
	}
}
