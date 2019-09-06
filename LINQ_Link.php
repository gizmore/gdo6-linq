<?php
namespace GDO\Linq;

use GDO\Core\GDO;
use GDO\DB\GDT_AutoInc;
use GDO\Net\GDT_Url;
use GDO\File\GDT_MimeType;
use GDO\DB\GDT_CreatedAt;
use GDO\DB\GDT_CreatedBy;
use GDO\Tag\WithTags;
use GDO\DB\GDT_UInt;
use GDO\Tag\GDT_Tags;

/**
 * A link inside the database.
 * @author gizmore
 *
 */
final class LINQ_Link extends GDO
{
	############
	### Tags ###
	############
	use WithTags;
	public function gdoTagTable() { return LINQ_LinkTags::table(); }
	
	###########
	### GDO ###
	###########
	public function gdoColumns()
	{
		return array(
			GDT_AutoInc::make('lql_id'),
			GDT_Url::make('lql_url')->unique(),
			GDT_Tags::make('lql_tags')->tagtable(LINQ_LinkTags::table()),
			GDT_MimeType::make('lql_type')->editable(false),
			GDT_UInt::make('lql_views')->notNull()->initial('0')->editable(false),
			GDT_CreatedAt::make('lql_created'),
			GDT_CreatedBy::make('lql_creator'),
		);
	}

	
}
