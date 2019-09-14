<?php
namespace GDO\Linq\Importer;

use GDO\Core\WithName;

abstract class Base
{
	use WithName;
	
	public function renderChoice() { return $this->gdoShortName(); }
	
	/**
	 * @param string $path
	 * @return \GDO\Linq\LINQ_Link[]
	 */
	public abstract function importFile($path);
	
	public function getMimeType($url)
	{
		return null;
	}
}
