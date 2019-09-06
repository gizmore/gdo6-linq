<?php
namespace GDO\Linq\Method;

use GDO\Table\MethodQueryTable;
use GDO\Linq\LINQ_List;

final class Lists extends MethodQueryTable
{
	public function getQuery() { return LINQ_List::table()->select(); }
	
	public function getHeaders()
	{
		return $this->getQuery()->table->gdoColumns();
	}
	
}
