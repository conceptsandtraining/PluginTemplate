<?php
include_once("./Services/Component/classes/class.ilPluginConfigGUI.php");

use \CaT\Plugins\<PLUGINNAME>;

/**
 * GUI class to add or delete training provider, trainer or tags
 *
 * @ilCtrl_Calls il<PLUGINNAME>ConfigGUI: ilDimensionsGUI
 * @ilCtrl_Calls il<PLUGINNAME>ConfigGUI: ilSetsGUI
 *
 * @author
 * @copyright (c) 1998-2017 ILIAS open source, Extended GPL, see docs/LICENSE
 */
class il<PLUGINNAME>ConfigGUI extends ilPluginConfigGUI
{
	/**
	 * @var \ilCtrl
	 */
	protected $g_ctrl;

	/**
	 * @var \ilTabsGUI
	 */
	protected $g_tabs;

	/**
	 * @var \CaT\Plugins\<PLUGINNAME>\ilPluginActions | null
	 */
	protected $plugin_actions;

	/**
	 * Constructor of the class il<PLUGINNAME>ConfigGUI.
	 *
	 * @return 	void
	 */
	public function __construct()
	{
		global $DIC;

		$this->g_ctrl = $DIC->ctrl();
		$this->g_tabs = $DIC->tabs();
	}

	/**
	 * Delegate incoming comands.
	 *
	 * @param 	string 	$cmd
	 * @return 	void
	 */
	public function performCommand($cmd)
	{
		$this->plugin_actions = $this->plugin_object->getPluginActions();

		$next_class = $this->g_ctrl->getNextClass();

		switch ($next_class) {
			default:
		}
	}

	/**
	 * Sets tabs.
	 *
	 * @return void
	 */
	protected function setTabs()
	{
	}