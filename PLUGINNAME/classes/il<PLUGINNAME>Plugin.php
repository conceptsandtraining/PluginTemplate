<?php

require_once("./Services/User/classes/class.ilUDFClaimingPlugin.php");

/**
 * Plugin base class. Keeps all information the plugin needs
 */
class il<PLUGINNAME>Plugin extends ilUDFClaimingPlugin {
	/**
	 * Get the name of the Plugin
	 *
	 * @return string
	 */
	public function getPluginName() {
		return "PLUGINNAME";
	}

	/**
	 * Check the permissions
	 *
	 * @inheritdoc
	 */
	public function checkPermission($a_user_id, $a_context_type, $a_context_id, $a_action_id, $a_action_sub_id) {
		
	}
}

?>