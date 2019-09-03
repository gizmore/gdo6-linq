<?php
namespace GDO\Linq;

use GDO\Core\GDO;
use GDO\DB\GDT_AutoInc;
use GDO\DB\GDT_String;

final class LINQ_Domain extends GDO
{
	public function gdoColumns()
	{
		return array(
			GDT_AutoInc::make('lqd_id'),
			GDT_String::make('lqd_name'),
		);
	}

	
}
