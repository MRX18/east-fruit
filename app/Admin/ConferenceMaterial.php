<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\ConferenceMaterial;
use App\Event;

AdminSection::registerModel(ConferenceMaterial::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Материалы конференции');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),

        	AdminColumn::text('ConferenceMaterialRelation.title')->setLabel('Cобытие')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::text('title', 'Материалы конференции')->required(),
            AdminFormElement::select('id_event', 'Событие')->setModelForOptions(new Event)->setDisplay(function($Event) {
                return $Event->title;
            })->required(),

            AdminFormElement::upload('pdf', 'PDF файл к статье')->required()
        )->setHtmlAttribute('enctype', 'multipart/form-data');
    });
});
	// ->addMenuPage(ConferenceMaterial::class, 300)
 //    ->setIcon('fa fa-sliders');