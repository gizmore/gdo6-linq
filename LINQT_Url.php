<?php
namespace GDO\Linq;

use GDO\Net\GDT_Url;
use GDO\Core\GDT_Template;

final class LINQT_Url extends GDT_Url
{
	public function renderCell()
	{
		return GDT_Template::php('Linq', 'cell/url.php', ['field'=>$this]);
	}
}
