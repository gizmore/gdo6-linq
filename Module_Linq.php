<?php
namespace GDO\Linq;

use GDO\Core\GDO_Module;

/**
 * This is the linq website.
 * License is properitary. GDO modules usually are not.
 * @author gizmore
 * @version 6.10
 * @since 6.10
 * @license properitary
 */
final class Module_Linq extends GDO_Module
{
	##############
	### Module ###
	##############
	public $module_license = "properitary";
	public $module_priority = 80;
	
	public function isSiteModule() { return true; }
	public function getThemes() { return ['linq']; }
	public function getDependencies() { return ['Material', 'Tag', 'News', 'Forum', 'Vote']; }
	public function onLoadLanguage() { $this->loadLanguage('lang/linq'); }
	public function getClasses()
	{
		return array(
			'GDO\\Linq\\LINQ_Domain',
			'GDO\\Linq\\LINQ_Link',
			'GDO\\Linq\\LINQ_LinkTags',
			'GDO\\Linq\\LINQ_List',
			'GDO\\Linq\\LINQ_ListLink',
		);
	}
	
	public function onIncludeScripts()
	{
		
	}
}
