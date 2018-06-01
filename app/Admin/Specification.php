<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Specification;
use App\Product;

AdminSection::registerModel(Specification::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Спецификация');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),
            AdminColumn::text('title')->setLabel('Название')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            
            AdminFormElement::text('title', 'Название')->required(),
            AdminFormElement::select('id_product', 'Категория')->setModelForOptions(new Product)->setDisplay(function($Product) {
                return $Product->name;
            })->required()

        );
    });
}); 
	// ->addMenuPage(Specification::class, 300)
 //    ->setIcon('fa fa-sliders');