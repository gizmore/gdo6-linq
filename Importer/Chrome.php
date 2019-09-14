<?php
namespace GDO\Linq\Importer;

use GDO\Linq\LINQ_Link;

final class Chrome extends Base
{
	public function importFile($path)
	{
		$links = [];
		$matches = [];
		$pattern = '#<A HREF="([^"]+)".*ICON="([^"]+)".*>([^<]+)</A>#';
		$filedata = file_get_contents($path);

		preg_match_all($pattern, $filedata, $matches);
		$len = count($matches[1]);
		
		for ($i = 0; $i < $len; $i++)
		{
			$links[] = LINQ_Link::blank(array(
				'lql_title' => mb_substr($matches[3][$i], 0, 256),
				'lql_url' => $matches[1][$i],
				'lql_icon' => $matches[2][$i],
			));
		}
		return $links;
	}
	
}
