<?php
namespace GDO\Linq\Method;

use GDO\Form\MethodCrud;
use GDO\Linq\LINQ_Link;

final class Crud extends MethodCrud
{
	public function hrefList()
	{
		return href('Linq', 'Links');
	}

	public function gdoTable()
	{
		return LINQ_Link::table();
	}

	
}
