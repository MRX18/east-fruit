<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Product;

AdminSection::registerModel(Product::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Категории');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),
            AdminColumn::text('name')->setLabel('Название')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            
            AdminFormElement::text('name', 'Название')->required()

        );
    });
}); 
	// ->addMenuPage(Product::class, 300)
 //    ->setIcon('fa fa-sliders');