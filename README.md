# Repository
**This is a template for an ILIAS plugin for repository objects**

# Guide
```
* Rename the plugin folder to youre pluginname
* Rename all files. (Replace <PLUGINNAME> with pluginname)
* Rename all classnames. (Replace <PLUGINNAME> with pluginname)
* Set plugin type in files
* Update composer
```

# Disable link option
```
* Open ilObj<PLUGINNAME>ListGUI.php
* Browse to function _initListActions_ (If not exist create)
* Set class property link_enabled to false
```
