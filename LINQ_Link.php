<?php
namespace GDO\Linq;

use GDO\Core\GDO;
use GDO\DB\GDT_AutoInc;
use GDO\File\GDT_MimeType;
use GDO\DB\GDT_CreatedAt;
use GDO\DB\GDT_Object;
use GDO\Tag\WithTags;
use GDO\DB\GDT_UInt;
use GDO\Tag\GDT_Tags;
use GDO\UI\GDT_IconBlob;
use GDO\UI\GDT_Title;

/**
 * A link inside the database.
 * @author gizmore
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
			GDT_Title::make('lql_title')->max(256),
			LINQT_List::make('lql_list')->table(LINQ_List::table())->notNull(),
			LINQT_Url::make('lql_url'),
			GDT_Tags::make('lql_tags')->tagtable(LINQ_LinkTags::table()),
			GDT_MimeType::make('lql_type')->editable(false),
			GDT_UInt::make('lql_views')->notNull()->initial('0')->editable(false),
			GDT_CreatedAt::make('lql_created'),
			GDT_IconBlob::make('lql_icon')->binary()->max(8192),
		);
	}

	############
	### URLs ###
	############
	public function href_edit() { return href('Linq', 'CrudLink', "&id={$this->getID()}"); }
	public function href_redirect() { return href('Linq', 'Redirect', "&id={$this->getID()}"); }
	
	##############
	### Getter ###
	##############
	public function getURL() { return $this->getVar('lql_url'); }
	public function displayURL() { return html($this->getURL()); }
	
	public function getTitle() { return $this->getVar('lql_title'); }
	public function displayTitle() { return html($this->getTitle()); }
 
}
