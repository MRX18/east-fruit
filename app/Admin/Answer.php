<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Answer;
use App\Question;

AdminSection::registerModel(Answer::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Ответы');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),

        	AdminColumn::text('title')->setLabel('Ответ'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::select('id_questions', 'Вопрос')->setModelForOptions(new Question)->setDisplay(function($Question) {
                return $Question->title;
            })->required(),
            AdminFormElement::text('title', 'Ответ')->required(),
            AdminFormElement::text('count', 'Проголосовало')->setReadonly(true)
        );
    });
}); 
	// ->addMenuPage(Answer::class, 300)
 //    ->setIcon('fa fa-sliders');