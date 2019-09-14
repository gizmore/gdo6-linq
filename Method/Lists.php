<?php
namespace GDO\Linq\Method;

use GDO\Table\MethodQueryTable;
use GDO\Linq\LINQ_List;
use GDO\Profile\GDT_User;
use GDO\UI\GDT_Bar;
use GDO\UI\GDT_Link;
use GDO\Core\GDT_Response;
use GDO\User\GDO_User;
use GDO\UI\GDT_EditButton;
use GDO\DB\GDT_UInt;

final class Lists extends MethodQueryTable
{
	public function gdoParameters()
	{
		return array(
			GDT_User::make('user'),
		);
	}
	
	/**
	 * @return \GDO\User\GDO_User
	 */
	private function getUser()
	{
		return $this->gdoParameterValue('user');
	}
	
	public function getQuery()
	{
		$table = LINQ_List::table();
		$query = $table->select('*');
		$query->select("(SELECT COUNT(*) FROM linq_link WHERE lql_list=lqlst_id) AS count");
		/**
		 * @var \GDO\Friends\GDT_ACL $acl
		 */
		$acl = $table->gdoColumn('lqlst_acl');
		if ($user = $this->getUser())
		{
			$query->where("lqlst_creator={$user->getID()}");
		}
		else
		{
			$acl->aclQuery($query, GDO_User::current(), 'lqlst_creator');
		}
		return $query;
	}
	
	public function getHeaders()
	{
		$table = LINQ_List::table();		
		return array(
			GDT_EditButton::make('edit'),
			GDT_UInt::make('count'),
			$table->gdoColumn('lqlst_title'),
			$table->gdoColumn('lqlst_creator'),
			
		);
		return $this->getQuery()->table->gdoColumns();
	}
	
	private function getNavBar()
	{
		$bar = GDT_Bar::make('bar')->horizontal();
		$bar->addField(GDT_Link::make('link_linq_import')->href(href('Linq', 'Import')));
		$bar->addField(GDT_Link::make('link_linq_add_list')->href(href('Linq', 'CrudList')));
		return $bar;
	}
	
	public function execute()
	{
		$bar = $this->getNavBar();
		return GDT_Response::makeWith($bar)->add(parent::execute());
	}
}
