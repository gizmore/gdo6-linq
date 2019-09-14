<?php
/** @var $field \GDO\Linq\LINQT_Url **/
/** @var $link \GDO\Linq\LINQ_Link **/
$link = $field->gdo;
?>
<a
 title="<?=$link->displayURL()?>"
 target="_blank"
 href="<?=href('Linq', 'Redirect', "id={$link->href_redirect()}")?>"><?=$link->displayTitle()?></a>
 