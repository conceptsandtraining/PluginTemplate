<?php
include_once("./Services/Cron/classes/class.ilCronHookPlugin.php");

/**
 * Plugin base class. Keeps all information the plugin needs
 */
class il<PLUGINNAME>Plugin extends ilCronHookPlugin {
	/**
	 * Get the name of the Plugin
	 *
	 * @return string
	 */
	function getPluginName() {
		return "<PLUGINNAME>";
	}

	/**
	 * Get an array with 1 to n numbers of cronjob objects
	 *
	 * @return ilCronJob[]
	 */
	public function getCronJobInstances() {
	}

	/**
	 * Get a single cronjob object
	 *
	 * @return ilCronJob
	 */
	public function getCronJobInstance($a_job_id) {
	}
}
