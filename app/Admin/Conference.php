<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Conference;
use App\Event;

AdminSection::registerModel(Conference::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('О конференции');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),

        	AdminColumn::text('conferenceRelation.title')->setLabel('ID события'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::select('id_event', 'Событие')->setModelForOptions(new Event)->setDisplay(function($Event) {
                return $Event->title;
            })->required(),

            AdminFormElement::ckeditor('text', 'Текст')->required()
        );
    });
});
	// ->addMenuPage(Conference::class, 300)
 //    ->setIcon('fa fa-sliders');