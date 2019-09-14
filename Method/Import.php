<?php
namespace GDO\Linq\Method;

use GDO\Form\GDT_Form;
use GDO\Form\MethodForm;
use GDO\Form\GDT_Submit;
use GDO\Form\GDT_AntiCSRF;
use GDO\File\GDT_File;
use GDO\Linq\LINQT_ImportType;
use GDO\File\GDO_File;
use GDO\Linq\LINQ_List;
use GDO\Tag\GDT_Tags;
use GDO\Core\Website;

final class Import extends MethodForm
{
	public function createForm(GDT_Form $form)
	{
		$form->addField(LINQT_ImportType::make('import_type'));
		$form->addField(GDT_File::make('import_file')->notNull());
		$form->addField(GDT_Tags::make('import_tags'));
		$form->addField(GDT_Submit::make());
// 		$form->addField(GDT_AntiCSRF::make());
	}
	
	/**
	 * @return \GDO\Linq\Importer\Base
	 */
	private function getImporter() { return $this->getForm()->getFormValue('import_type'); }
	private function getImportType() { return $this->getForm()->getFormVar('import_type'); }
	
	/**
	 * @return \GDO\Linq\LINQT_ImportType
	 */
	private function getImportTypeField() { return $this->getForm()->getField('import_type'); }
	
	/**
	 * @return \GDO\File\GDO_File
	 */
	private function getFile()
	{
		return $this->getForm()->getFormValue('import_file');
	}
	
	public function formValidated(GDT_Form $form)
	{
		$file = $this->getFile();
		$importers = $this->getImportType() === null ? $this->getImportTypeField()->getImporters() : [$this->getImporter()];
		if (!($links = $this->generateLinks($importers, $file)))
		{
			return $this->error('err_linq_import');
		}
		
		$list = LINQ_List::blank()->insert();
		$listId = $list->getID();
		$tags = $form->getFormValue('import_tags');
		foreach ($links as $link)
		{
			$link->setVar('lql_list', $listId);
			$link->insert();
			$link->updateTags($tags);
		}
		
		return $this->message('msg_linq_imported')->add(Website::redirect(href('Linq', 'CrudList', '&id='.$listId)));
	}
	
	/**
	 * 
	 * @param \GDO\Linq\Importer\Base[] $importers
	 * @param GDO_File $file
	 * @return \GDO\Linq\LINQ_Link[]
	 */
	private function generateLinks(array $importers, GDO_File $file)
	{
		$path = $file->getPath();
		foreach ($importers as $importer)
		{
			$links = $importer->importFile($path);
			if (!empty($links))
			{
				return $links;
			}
		}
	}
	
}
