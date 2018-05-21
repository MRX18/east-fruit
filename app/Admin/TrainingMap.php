<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\TrainingMap;
use App\Training;

AdminSection::registerModel(TrainingMap::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Место проведения');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),

        	AdminColumn::text('id_training')->setLabel('ID поездки'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::select('id_training', 'Поездка')->setModelForOptions(new Training)->setDisplay(function($Training) {
                return $Training->title;
            })->required(),

            AdminFormElement::ckeditor('text', 'Текст(iframe google map)')->required()
        );
    });
});
	// ->addMenuPage(TrainingMap::class, 300)
 //    ->setIcon('fa fa-sliders');