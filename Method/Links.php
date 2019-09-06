<?php
namespace GDO\Linq\Method;

use GDO\Table\MethodQueryTable;
use GDO\Linq\LINQ_Link;

final class Links extends MethodQueryTable
{
	public function getQuery() { return LINQ_Link::table()->select(); }
	
	public function getHeaders()
	{
		return $this->getQuery()->table->gdoColumns();
	}
	
}
