<?php
namespace GDO\Linq;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_Bar;
use GDO\UI\GDT_Link;

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
	public function getDependencies() { return ['Material', 'Tag', 'News', 'Forum', 'Vote', 'Login', 'Register', 'Recovery', 'Admin', 'Account', 'Profile', 'PM', 'Perf', 'LoginAs', 'JQuery']; }
	public function onLoadLanguage() { $this->loadLanguage('lang/linq'); }
	public function getClasses()
	{
		return array(
			'GDO\Linq\LINQ_Domain',
			'GDO\Linq\LINQ_Link',
			'GDO\Linq\LINQ_LinkTags',
			'GDO\Linq\LINQ_List',
			'GDO\Linq\LINQ_ListLink',
		);
	}
	
	public function onIncludeScripts()
	{
		
	}
	
	#############
	### Hooks ###
	#############
	public function hookLeftBar(GDT_Bar $bar)
	{
		$bar->addField(GDT_Link::make('link_add')->href(href('Linq', 'Crud')));
	}

	public function hookRightBar(GDT_Bar $bar)
	{
		$bar->addField(GDT_Link::make('link_lists')->href(href('Linq', 'Lists')));
	}
}
