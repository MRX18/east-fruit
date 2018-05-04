<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Speaker;
use App\Event;

AdminSection::registerModel(Speaker::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Спикеры');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),

        	AdminColumn::text('title')->setLabel('Спикер'),
            AdminColumn::image('img')->setLabel('Изображение')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::text('title', 'Спикер')->required(),
            AdminFormElement::select('id_event', 'Событие')->setModelForOptions(new Event)->setDisplay(function($Event) {
                return $Event->title;
            })->required(),

            AdminFormElement::ckeditor('text', 'Текст')->required(),
            AdminFormElement::image('img', 'Изображение')->required()
        );
    });
}); 
	// ->addMenuPage(Speaker::class, 300)
 //    ->setIcon('fa fa-sliders');