<?php
include_once("./Services/Repository/classes/class.ilObjectPluginGUI.php");

/**
 * Plugin object GUI class. Baseclass for all GUI action in ILIAS
 *
 * @ilCtrl_isCalledBy ilObj<PLUGINNAME>GUI: ilRepositoryGUI, ilAdministrationGUI, ilObjPluginDispatchGUI
 * @ilCtrl_Calls ilObj<PLUGINNAME>GUI: ilPermissionGUI, ilInfoScreenGUI, ilObjectCopyGUI, ilCommonActionDispatcherGUI
 */
class ilObj<PLUGINNAME>GUI  extends ilObjectPluginGUI
{
	const CMD_EDIT_PROPERTIES = "editProperties";

	const TAB_SETTINGS = "settings";

	/**
	 * @var ilTemplate
	 */
	protected $g_tpl;

	/**
	 * @var ilCtrl
	 */
	protected $g_ctrl;

	/**
	 * @var ilTabs
	 */
	protected $g_tabs;

	/**
	 * @var ilToolbarGUI
	 */
	protected $g_toolbar;

	/**
	 * @var ilObjUser
	 */
	protected $g_usr;

	/**
	 * @var ilAccessHandler
	 */
	protected $g_access;

	/**
	 * @var ilLanguage
	 */
	protected $g_lng;

	/**
	 * Called after parent constructor. It's possible to define some plugin special values.
	 *
	 * @return 	void
	 */
	protected function afterConstructor()
	{
		global $DIC;

		$this->g_tpl = $DIC->ui()->mainTemplate();
		$this->g_ctrl = $DIC->ctrl();
		$this->g_tabs = $DIC->tabs();
		$this->g_toolbar = $DIC->toolbar();
		$this->g_usr = $DIC->user();
		$this->g_access = $DIC->access();
		$this->g_lng = $DIC->language();

		$this->g_lng->loadLanguageModule("");
	}

	/**
	* Get type. Same value as choosen in plugin.php.
	*
	* @return 	void
	*/
	final public function getType() {
		return "";
	}

	/**
	 * Handles all commmands of this class, centralizes permission checks.
	 *
	 * @param 	string 	$cmd
	 * @return 	void
	 */
	public function performCommand($cmd) {
		$cmd = $this->g_ctrl->getCmd();
		$next_class = $this->g_ctrl->getNextClass();

		if(!$this->object->getSettings()->getIsOnline()) {
			$this->g_tpl->setAlertProperties(array(
			[
				"alert" => true,
				"property" => $this->g_lng->txt("status"),
				"value" => $this->g_lng->txt("offline")
			]));
		}
		switch ($next_class) {
			case 'ilsettingsgui':
				$this->forwardSettings();
				break;
			default:
				switch ($cmd) {
					case self::CMD_EDIT_PROPERTIES:
						$this->redirectSettings();
						break;
					default:
						throw new Exception("ilObj{{PLUGINNAME}}GUI: Unknown command: ".$cmd);
				}
		}
	}

	/**
	 * After object has been created -> jump to this command.
	 *
	 * @return 	string
	 */
	public function getAfterCreationCmd()
	{
		return "";
	}

	/**
	 * Get standard command.
	 *
	 * @return 	string
	 */
	public function getStandardCmd()
	{
		return "";
	}

	/**
	 * Forward to settings gui.
	 *
	 * @return 	void
	 */
	protected function forwardSettings()
	{
		$this->g_tabs->activateTab(self::TAB_SETTINGS);
		$gui = new \ilSettingsGUI(
			$this,
			$this->object->getObjectActions(),
			$this->object->txtClosure()
		);
		$this->g_ctrl->forwardCommand($gui);
	}

	/**
	 * Redirect to settings gui.
	 *
	 * @return 	void
	 */
	protected function redirectSettings()
	{
		$link = $this->g_ctrl->getLinkTargetByClass(
			array("ilObj{{PLUGINNAME}}GUI", "ilSettingsGUI"),
			ilSettingsGUI::CMD_SETTINGS,
			"",
			false,
			false
		);
		\ilUtil::redirect($link);
	}

	/**
	 * Set the tabs for the site.
	 *
	 * @return 	void
	 */
	protected function setTabs()
	{
		// Links
		$settings = $this->g_ctrl->getLinkTargetByClass(
			array("ilObjAgendaItemPoolGUI", "ilAIPSettingsGUI"),
			ilAIPSettingsGUI::CMD_SETTINGS
		);

		// Tabs
		$this->addInfoTab();

		// Add the other tabs here.
		if ($this->g_access->checkAccess("write", "", $this->object->getRefId())) {
			$this->g_tabs->addTab(self::TAB_SETTINGS, $this->txt("settings"), $settings);
		}

		$this->addPermissionTab();
	}
}
