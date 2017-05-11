<?php
include_once("./Services/Repository/classes/class.ilRepositoryObjectPlugin.php");

/**
 * Plugin base class. Keeps all information the plugin needs
 */
class il<PLUGINNAME>Plugin extends ilRepositoryObjectPlugin {
	const COPY_OPERATION_ID = 58;
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

	protected function beforeActivation()
	{
		parent::beforeActivation();
		global $DIC;
		$db = $DIC->database();

		$type = $this->getId();

		if (!$this->isRepositoryPlugin($type)) {
			throw new ilPluginException("Object plugin type must start with an x. Current type is ".$type.".");
		}

		$type_id = $this->getTypeId($type, $db);
		if(!$type_id) {
			$type_id = $this->createTypeId($type, $db);
		}

		$this->assignCopyPermissionToPlugin($type_id, $db);

		return true;
	}

	/**
	 * Check current plugin is repository plgind
	 *
	 * @param string 	$type
	 *
	 * @return bool
	 */
	protected function isRepositoryPlugin($type) {
		return substr($type, 0, 1) == "x");
	}

	/**
	 * Get id of current type
	 *
	 * @param string 	$type
	 * @param 			$db
	 *
	 * @return int | null
	 */
	protected function getTypeId($type, $db) {
		$set = $db->query("SELECT obj_id FROM object_data ".
			" WHERE type = ".$db->quote("typ", "text").
			" AND title = ".$db->quote($type, "text"));

		if($db->numRows($set) == 0) {
			return null;
		}

		$rec = $db->fetchAssoc($set);
		return $rec["obj_id"];
	}

	/**
	 * Create a new entry in object data
	 *
	 * @param string 	$type
	 * @param 			$db
	 *
	 * @return int
	 */
	protected function createTypeId($type, $db) {
		$type_id = $db->nextId("object_data");
		$db->manipulate("INSERT INTO object_data ".
			"(obj_id, type, title, description, owner, create_date, last_update) VALUES (".
			$db->quote($type_id, "integer").",".
			$db->quote("typ", "text").",".
			$db->quote($type, "text").",".
			$db->quote("Plugin ".$this->getPluginName(), "text").",".
			$db->quote(-1, "integer").",".
			$db->quote(ilUtil::now(), "timestamp").",".
			$db->quote(ilUtil::now(), "timestamp").
			")");

		return $type_id;
	}

	/**
	 * Assign permission copy to current plugin
	 *
	 * @param int 		$type_id
	 * @param 			$db
	 *
	 * @return int
	 */
	protected function assignCopyPermissionToPlugin($type_id, $db) {
		$ops = array(self::COPY_OPERATION_ID);

		foreach ($ops as $op) {
			// check whether type exists in object data, if not, create the type
			
			if (!$this->permissionIsAssigned($type_id, $op, $db)) {
				$db->manipulate("INSERT INTO rbac_ta ".
					"(typ_id, ops_id) VALUES (".
					$db->quote($type_id, "integer").",".
					$db->quote($op, "integer").
					")");
			}
		}
	}

	/**
	 * Checks permission is not assigned to plugin
	 *
	 * @param int 		$type_id
	 * @param int 		$op_id
	 * @param 			$db
	 *
	 * @return bool
	 */
	protected function permissionIsAssigned($type_id, $op_id, $db) {
		$set = $db->query("SELECT count(typ_id) as cnt FROM rbac_ta ".
				" WHERE typ_id = ".$db->quote($type_id, "integer").
				" AND ops_id = ".$db->quote($op_id, "integer"));

		$rec = $db->fetchAssoc($set);

		return $rec["cnt"] > 0;
	}

	/**
	 * decides if this repository plugin can be copied
	 *
	 * @return bool
	 */
	public function allowCopy()
	{
		return true;
	}
}
