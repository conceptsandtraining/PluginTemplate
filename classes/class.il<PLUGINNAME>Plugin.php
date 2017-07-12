<?php
require_once("./Services/EventHandling/classes/class.ilEventHookPlugin.php");

/**
 * Plugin base class. Keeps all information the plugin needs
 */
class il<PLUGINNAME>Plugin extends ilEventHookPlugin {
	/**
	 * Perform command if the event is thrown
	 *
	 * @inheritdoc
	 */
	function handleEvent($a_component, $a_event, $a_parameter) {

	}
}