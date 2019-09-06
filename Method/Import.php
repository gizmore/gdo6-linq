<?php
namespace GDO\Linq\Method;

use GDO\Form\GDT_Form;
use GDO\Form\MethodForm;
use GDO\Form\GDT_Submit;
use GDO\Form\GDT_AntiCSRF;
use GDO\File\GDT_File;

final class Import extends MethodForm
{
	public function createForm(GDT_Form $form)
	{
		$form->addField(GDT_File::make('import_file'));
		$form->addField(GDT_Submit::make());
		$form->addField(GDT_AntiCSRF::make());
	}
	
	public function formValidated(GDT_Form $form)
	{
		
	}
	
}
