<?php
namespace GDO\Linq;

use GDO\DB\GDT_ObjectSelect;
use GDO\User\GDO_User;

/**
 * A select for all your lists.
 * @author gizmore
 */
final class LINQT_List extends GDT_ObjectSelect
{
	public function __construct()
	{
		$this->table(LINQ_List::table());
		$this->completionHref(href('Linq', 'CompleteLists'));
	}
	
	public function initChoices()
	{
		if (!$this->choices)
		{
			$user = GDO_User::current();
			$query = LINQ_List::table()->select();
			$query->where("lqlst_creator={$user->getID()}");
			$this->choices = $query->exec()->fetchAllArray2dObject();
		}
	}

}
