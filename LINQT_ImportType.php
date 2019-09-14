<?php
namespace GDO\Linq;

use GDO\DB\GDT_ObjectSelect;
use GDO\File\Filewalker;
use GDO\Util\Strings;

final class LINQT_ImportType extends GDT_ObjectSelect
{
	public function __construct()
	{
		$this->initChoices();
	}
	
	public function initChoices()
	{
		# Try all as option
		$this->choices = ['0' => t('linq_guess_format')];
		# Walk Importer directory
		$module = Module_Linq::instance();
		Filewalker::traverse($module->filePath('Importer'), null, [$this, 'initImporter']);
	}
	
	public function initImporter($entry, $fullpath, $args=null)
	{
		if ($entry !== 'Base.php')
		{
			$entryclass = Strings::substrTo($entry, '.php');
			$importer = $this->createImporter($entryclass);
			$this->choices[$entryclass] = $importer;
		}
	}
	
	/**
	 * @param string $name
	 * @return \GDO\Linq\Importer\Base
	 */
	public function createImporter($name)
	{
		$class = "GDO\\Linq\\Importer\\$name";
		$object = new $class();
		return $object;
	}
	
	public function toValue($var)
	{
		if ($var)
		{
			return $this->createImporter($var);
		}
	}
	
	public function getImporter()
	{
		return $this->createImporter($this->var);
	}
	
	public function getImporters()
	{
		$importers = [];
		foreach ($this->choices as $importer)
		{
			if (is_object($importer))
			{
				$importers[] = $importer;
			}
		}
		return $importers;
	}
	
	public function validateSingle($value)
	{
		return true;
	}
}
