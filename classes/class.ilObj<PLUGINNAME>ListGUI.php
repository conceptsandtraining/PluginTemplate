<?php
include_once("./Services/Repository/classes/class.ilObjectPluginListGUI.php");

/**
 * List gui class for plugin object in repository.
 *
 * @author
 * @copyright Extended GPL, see LICENSE
 */
class ilObj<PLUGINNAME>ListGUI extends ilObjectPluginListGUI
{
	/**
	 * Init the type of the plugin. Same value as choosen in plugin.php.
	 *
	 * @return 	void
	 */
	public function initType() {
		$this->setType("");
	}

	/**
	 * Get name of gui class handling the commands.
	 *
	 * @return 	ilObj<PLUGINNAME>GUI
	 */
	public function getGuiClass() {
		return "ilObj<PLUGINNAME>GUI";
	}

	/**
	 * Get commands.
	 *
	 * @return 	void
	 */
	public function initCommands() {

		return array(
			[
				"permission" => "read",
				"cmd" => "showContent",
				"default" => true
			],
			[
				"permission" => "write",
				"cmd" => "editProperties",
				"txt" => $this->txt("edit"),
				"default" => false
			]
		);
	}

	/**
	 * Init the commands for the list actions.
	 *
	 * @return 	void
	 */
	protected function initListActions()
	{
		$this->delete_enabled = true;
		$this->cut_enabled = true;
		$this->subscribe_enabled = true;
		$this->link_enabled = true;
		$this->info_screen_enabled = true;
		$this->copy_enabled = true;
	}
}
