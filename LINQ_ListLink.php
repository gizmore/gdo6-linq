<?php
namespace GDO\Linq;

use GDO\Core\GDO;
use GDO\DB\GDT_CreatedAt;
use GDO\DB\GDT_Object;
use GDO\DB\GDT_CreatedBy;

final class LINQ_ListLink extends GDO
{
	public function gdoColumns()
	{
		return array(
			GDT_Object::make('lqll_list')->table(LINQ_List::table())->primary(),
			GDT_Object::make('lqll_link')->table(LINQ_Link::table())->primary(),
			GDT_CreatedAt::make('lqll_created'),
			GDT_CreatedBy::make('lqll_creator'),
		);
	}
	
	
}
