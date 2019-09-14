<?php
namespace GDO\Linq\Method;

use GDO\Form\MethodCrud;
use GDO\Linq\LINQ_List;

final class CrudList extends MethodCrud
{
	public function hrefList()
	{
		return href('Linq', 'Lists');
	}

	public function gdoTable()
	{
		return LINQ_List::table();
	}
	
}
