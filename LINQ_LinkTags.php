<?php
namespace GDO\Linq;

use GDO\Tag\GDO_TagTable;

final class LINQ_LinkTags extends GDO_TagTable
{
	public function gdoTagObjectTable() { return LINQ_Link::table(); }
	
}
