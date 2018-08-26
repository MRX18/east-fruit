<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Currency;
use App\Market;

AdminSection::registerModel(Currency::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Валюта');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),
            AdminColumn::text('currency')->setLabel('Название')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            
            AdminFormElement::text('currency', 'Название')->required(),

            AdminFormElement::select('id_market', 'Страна')->setModelForOptions(new Market)->setDisplay(function($Market) {
                return $Market->market;
            }),

            AdminFormElement::text('charCode', 'Символьный код')->required()

        );
    });
}); 
	// ->addMenuPage(Currency::class, 300)
 //    ->setIcon('fa fa-sliders');