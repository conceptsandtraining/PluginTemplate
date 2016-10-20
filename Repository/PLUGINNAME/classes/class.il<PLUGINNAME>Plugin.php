<?php
include_once("./Services/Repository/classes/class.ilRepositoryObjectPlugin.php");

/**
 * Plugin base class. Keeps all information the plugin needs
 */
class il<PLUGINNAME>Plugin.php extends ilRepositoryObjectPlugin {
	/**
	 * Get the name of the Plugin
	 *
	 * @return string
	 */
	function getPluginName() {
		return "<PLUGINNAME>";
	}

	/**
	 * Defines custom uninstall action like delete table or something else
	 */
	protected function uninstallCustom() {
	}
}