<?php
include_once("Services/Repository/classes/class.ilObjectPlugin.php");

use CaT\Plugins\<PLUGINNAME>\ilObjectActions;

/**
 * Object of the plugin.
 *
 * @author
 * @copyright Extended GPL, see LICENSE
 */
class ilObj<PLUGINNAME> extends ilObjectPlugin implements Obj<PLUGINNAME>
{
	/**
	 * @var ilObjectActions
	 */
	protected $object_actions;

	/**
	 * @var 
	 */

	/**
	 * Get called if the object get be coppied.
	 * Copy additional settings to new object.
	 *
	 * @return 	void
	 */
	public function doCloneObject($new_obj, $a_target_id, $a_copy_id = null)
	{

	}

	/**
	 * Create settings or proider objects.
	 *
	 * @return 	void
	 */
	public function doCreate()
	{

	}

	/**
	 * Get called if the object should be deleted.
	 * Delete additional settings.
	 *
	 * @return 	void
	 */
	public function doDelete()
	{

	}

	/**
	 * Get called after object creation to read further information.
	 *
	 * @return 	void
	 */
	public function doRead()
	{

	}

	/**
	 * Get called if the object get be updated.
	 * Update additoinal setting values.
	 *
	 * @return 	void
	 */
	public function doUpdate()
	{

	}

	/**
	 * Get the object actions.
	 *
	 * @return 	ilObjectActions
	 */
	public function getObjectActions()
	{
		if($this->object_actions == null) {
			$this->object_actions = new ilObjectActions();
		}
		return $this->object_actions;
	}

	/**
	 * Get the first parent object in tree for given types.
	 *
	 * @return 	ilObject|null
	 */
	public function getFirstParent()
	{
		global $DIC;
		$tree = $DIC->repositoryTree();

		$ref_id = $this->getRefId();
		if ($ref_id === null) {
			$ref_id = $_GET["ref_id"];
		}
		$parents = $tree->getPathFull($ref_id);
		$parents = array_filter($parents, function ($p) {
			if (in_array($p["type"], $this->getParentTypes())) {
				return $p;
			}
		});

		if (count($parents) > 0) {
			return array_pop($parents);
		}
		return null;
	}

	/**
	 * Get settings.
	 *
	 * @return 	void
	 */
	public function getSettings()
	{
		return $this->settings;
	}

	/**
	 * Init the type of the plugin. Same value as choosen in plugin.php
	 */
	public function initType()
	{
		$this->setType("");
	}

	/**
	 * Get a closure to get txts from plugin.
	 *
	 * @return \Closure
	 */
	public function txtClosure()
	{
		return function ($code) {
			return $this->txt($code);
		};
	}

	/**
	 * Update Settings.
	 *
	 * @param 	\Closure 	$c
	 * @return 	void
	 */
	public function updateSettings(\Closure $c)
	{
		$this->settings = $c($this->settings);
	}

	/**
	 * Get an array of relevant parent types.
	 *
	 * @return 	string[]
	 */
	protected function getParentTypes()
	{
		return array("crs");
	}
}