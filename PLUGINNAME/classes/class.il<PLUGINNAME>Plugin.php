<?php
require_once('./Modules/OrgUnit/classes/Types/class.ilOrgUnitTypeHookPlugin.php');

/**
 * Plugin base class. Keeps all information the plugin needs
 */
class il<PLUGINNAME>Plugin.php extends ilOrgUnitTypeHookPlugin {
	/**
	 * Get the name of the Plugin
	 *
	 * @return string
	 */
	function getPluginName() {
		return "<PLUGINNAME>";
	}

	/**
	* Return false if setting a title is not allowed
	*
	* @inhertidoc
	*/
	public function allowSetTitle($a_type_id, $a_lang_code, $a_title) {
		return (true || false);
	}

	/**
	* Return false if setting a description is not allowed
	*
	* @inhertidoc
	*/
	public function allowSetDescription($a_type_id, $a_lang_code, $a_description) {
		return (true || false);
	}

	/**
	* Return false if setting a default language is not allowed
	*
	* @inhertidoc
	*/
	public function allowSetDefaultLanguage($a_type_id, $a_lang_code) {
		return (true || false);
	}

	/**
	* Return false if OrgUnit type cannot be deleted
	*
	* @inhertidoc
	*/
	public function allowDelete($a_type_id) {
		return (true || false);
	}

	/**
	* Return false if OrgUnit type is locked and no updates are possible
	*
	* @inhertidoc
	*/
	public function allowUpdate($a_type_id) {
		return (true || false);
	}

	/**
	* Return false if an AdvancedMDRecord cannot be assigned to an OrgUnit type
	*
	* @inhertidoc
	*/
	public function allowAssignAdvancedMDRecord($a_type_id, $a_record_id) {
		return (true || false);
	}

	/**
	* Return false if an AdvancedMDRecord cannot be deassigned from an OrgUnit type
	*
	* @inhertidoc
	*/
	public function allowDeassignAdvancedMDRecord($a_type_id, $a_record_id) {
		return (true || false);
	}
}