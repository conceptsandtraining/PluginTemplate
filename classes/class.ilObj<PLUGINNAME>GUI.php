<?php
include_once("./Services/Repository/classes/class.ilObjectPluginGUI.php");

/**
 * Plugin object GUI class. Baseclass for all GUI action in ILIAS
 *
 * @ilCtrl_isCalledBy ilObj<PLUGINNAME>GUI: ilRepositoryGUI, ilAdministrationGUI, ilObjPluginDispatchGUI
 * @ilCtrl_Calls ilObj<PLUGINNAME>GUI: ilPermissionGUI, ilInfoScreenGUI, ilObjectCopyGUI, ilCommonActionDispatcherGUI
 */
class ilObj<PLUGINNAME>GUI  extends ilObjectPluginGUI {
	/**
	 * Called after parent constructor. It's possible to define some plugin special values
	 */
	protected function afterConstructor() {
	}

	/**
	* Get type.  Same value as choosen in plugin.php
	*/
	final public function getType() {
		return "";
	}

	/**
	* Handles all commmands of this class, centralizes permission checks
	*/
	public function performCommand($cmd) {
		switch ($cmd) {
			default:
		}
	}

	/**
	* After object has been created -> jump to this command
	*/
	public function getAfterCreationCmd() {
		return "";
	}

	/**
	* Get standard command
	*/
	public function getStandardCmd() {
		return "";
	}
}
