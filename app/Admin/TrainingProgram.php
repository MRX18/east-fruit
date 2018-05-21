<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\TrainingProgram;
use App\Training;

AdminSection::registerModel(TrainingProgram::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Программа поездки');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),

        	AdminColumn::text('title')->setLabel('Название'),
            AdminColumn::text('time')->setLabel('Время поездки'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::text('title', 'Название')->required(),
            AdminFormElement::text('time', 'Время проведения')->required(),
            AdminFormElement::select('id_training', 'Поездка')->setModelForOptions(new Training)->setDisplay(function($Training) {
                return $Training->title;
            })->required(),

            AdminFormElement::ckeditor('text', 'Текст')->required()
        );
    });
});
	// ->addMenuPage(TrainingProgram::class, 300)
 //    ->setIcon('fa fa-sliders');