<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\TrainingOrganizer;
use App\Training;

AdminSection::registerModel(TrainingOrganizer::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Организаторы');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),

        	AdminColumn::text('title')->setLabel('Организатор'),
            AdminColumn::image('img')->setLabel('Изображение')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::text('title', 'Организатор')->required(),
            AdminFormElement::select('id_training', 'Поездка')->setModelForOptions(new Training)->setDisplay(function($Training) {
                return $Training->title;
            })->required(),

            AdminFormElement::ckeditor('text', 'Текст')->required(),
            AdminFormElement::image('img', 'Изображение')->required()
        );
    });
});
	// ->addMenuPage(TrainingOrganizer::class, 300)
 //    ->setIcon('fa fa-sliders');