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
		global $tpl, $ilCtrl, $ilTabs, $ilUser, $ilToolbar, $ilAccess, $ilDB;

		/**
		 * @var $tpl       ilTemplate
		 * @var $ilCtrl    ilCtrl
		 * @var $ilTabs    ilTabsGUI
		 * @var $ilUser    ilObjUser
		 * @var $ilToolbar ilToolbarGUI
		 */
		$this->gTpl = $tpl;
		$this->gCtrl = $ilCtrl;
		$this->gTabs = $ilTabs;
		$this->gUsr = $ilUser;
		$this->gToolbar = $ilToolbar;
		$this->gAccess = $ilAccess;
		$this->plugin = $this->object->plugin;

	}

	/**
	* Get type.  Same value as choosen in plugin.php
	*/
	final function getType() {
		return "";
	}

	/**
	* Handles all commmands of this class, centralizes permission checks
	*/
	function performCommand($cmd) {
		switch ($cmd) {
			default:
		}
	}

	/**
	* After object has been created -> jump to this command
	*/
	function getAfterCreationCmd() {
		return "";
	}

	/**
	* Get standard command
	*/
	function getStandardCmd() {
		return "";
	}
}
