<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Price;
use App\Product;
use App\Market;
use App\Currency;

AdminSection::registerModel(Price::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Цены');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),
            AdminColumn::text('id_market')->setLabel('Рынки'),
            AdminColumn::text('id_product')->setLabel('Продукты'),
            AdminColumn::text('price')->setLabel('Цена'),
            AdminColumn::text('date')->setLabel('Дата'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::select('id_product', 'Рынки')->setModelForOptions(new Product)->setDisplay(function($Product) {
                return $Product->name;
            })->required(),
            AdminFormElement::select('id_market', 'Продукты')->setModelForOptions(new Market)->setDisplay(function($Market) {
                return $Market->market;
            })->required(),
            AdminFormElement::select('currency', 'Тип валюты')->setModelForOptions(new Currency)->setDisplay(function($Currency) {
                return $Currency->currency;
            })->required(),
            AdminFormElement::text('price', 'Цена')->required()

        );
    });
}) 
	->addMenuPage(Price::class, 300)
    ->setIcon('fa fa-sliders');