<?php
namespace GDO\Linq\Method;

use GDO\Table\MethodQueryTable;
use GDO\Linq\LINQ_Link;
use GDO\UI\GDT_EditButton;
use GDO\DB\GDT_UInt;

final class Links extends MethodQueryTable
{
	public function getQuery()
	{
		$table = LINQ_Link::table();
		$query = $table->select();
		return $query;
	}
	
	public function getHeaders()
	{
		$table = LINQ_Link::table();
		return array(
			GDT_EditButton::make('edit'),
			$table->gdoColumn('lql_url'),
			
		);
		return $this->getQuery()->table->gdoColumns();
	}
	
	public function execute()
	{
		return parent::execute();
	}
	
}
