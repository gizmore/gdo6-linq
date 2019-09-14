<?php
namespace GDO\Linq;

use GDO\Core\GDO;
use GDO\DB\GDT_AutoInc;
use GDO\DB\GDT_CreatedAt;
use GDO\UI\GDT_Title;
use GDO\DB\GDT_CreatedBy;
use GDO\Friends\GDT_ACL;
use GDO\UI\GDT_Message;

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
			GDT_Message::make('lqlst_description'),
			GDT_ACL::make('lqlst_acl'),
			GDT_CreatedAt::make('lqlst_created'),
			GDT_CreatedBy::make('lqlst_creator'),
		);
	}
	
	public function getTitle() { return $this->getVar('lqlst_title'); }
	public function displayTitle() { return html($this->getVar('lqlst_title')); }
	
	public function href_edit() { return href('Linq', 'CrudList', "&id={$this->getID()}"); }
	
	public function renderCell() { return $this->displayTitle(); }
	
	public function renderChoice()
	{
		return sprintf('%d - %s', $this->getID(), $this->displayTitle());
	}
	
	
}
