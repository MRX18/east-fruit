<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Program;
use App\Event;

AdminSection::registerModel(Program::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Програма конференцыи');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),

        	AdminColumn::text('title')->setLabel('Назва'),
            AdminColumn::text('time')->setLabel('Время проведения'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::text('time', 'Время проведения')->required(),
            AdminFormElement::select('id_event', 'Событие')->setModelForOptions(new Event)->setDisplay(function($Event) {
                return $Event->title;
            })->required(),

            AdminFormElement::ckeditor('text', 'Текс')->required()
        );
    });
}); 
	// ->addMenuPage(Program::class, 300)
 //    ->setIcon('fa fa-sliders');