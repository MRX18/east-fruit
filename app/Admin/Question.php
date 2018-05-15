<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Question;

AdminSection::registerModel(Question::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Вопросы');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),

        	AdminColumn::text('title')->setLabel('Название'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::text('title', 'Заголовок')->required()
        );
    });
}); 
	// ->addMenuPage(Question::class, 300)
 //    ->setIcon('fa fa-sliders');