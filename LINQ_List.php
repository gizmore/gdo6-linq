<?php
namespace GDO\Linq;

use GDO\Core\GDO;
use GDO\DB\GDT_AutoInc;
use GDO\DB\GDT_CreatedAt;
use GDO\UI\GDT_Title;
use GDO\DB\GDT_CreatedBy;

/**
 * A user created link list.
 * Might have been imported.
 * @author gizmore
 */
final class LINQ_List extends GDO
{
	public function gdoColumns()
	{
		return array(
			GDT_AutoInc::make('lqlst_id'),
			GDT_Title::make('lqlst_title'),
			GDT_CreatedAt::make('lqlst_created'),
			GDT_CreatedBy::make('lqlst_creator'),
		);
	}

	
}
