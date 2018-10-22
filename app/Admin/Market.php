<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Market;

AdminSection::registerModel(Market::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Страны');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),
            AdminColumn::text('market')->setLabel('Название'),
            AdminColumn::text('color')->setLabel('Цвет')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            
            AdminFormElement::text('market', 'Название')->required(),
            AdminFormElement::text('color', 'Цвет (0,0,0)')->required()

        );
    });
}); 
	// ->addMenuPage(Market::class, 300)
 //    ->setIcon('fa fa-sliders');