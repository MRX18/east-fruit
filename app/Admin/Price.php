<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Price;
use App\Product;
use App\Market;
use App\Currency;
use App\Specification;

AdminSection::registerModel(Price::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Цены');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();

        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),
            AdminColumn::text('MarketRelation.market')->setLabel('Страны'),
            AdminColumn::text('ProductRelation.name')->setLabel('Категории'),
            AdminColumn::text('SpecificationRelation.title')->setLabel('Спецификация'),
            AdminColumn::text('CurrencyRelation.currency')->setLabel('Валюта'),
            AdminColumn::text('price_input')->setLabel('Цена'),
            AdminColumn::text('date')->setLabel('Дата')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::date('date', 'Дата')->required(),

            AdminFormElement::select('id_market', 'Страны')->setModelForOptions(new Market)->setDisplay(function($Market) {
                return $Market->market;
            })->required(),

            AdminFormElement::select('id_product', 'Категории')->setModelForOptions(new Product)->setDisplay(function($Product) {
                return $Product->name;
            })->required(),

            AdminFormElement::dependentselect('id_specification', 'Спецификация')
                ->setModelForOptions(\App\Specification::class, 'title')
                ->setDataDepends(['id_product'])
                ->setLoadOptionsQueryPreparer(function($item, $query) {
                    return $query->where('id_product', $item->getDependValue('id_product'));
            }),

            AdminFormElement::select('currency', 'Валюта')->setModelForOptions(new Currency)->setDisplay(function($Currency) {
                return $Currency->currency;
            })->required(),

            AdminFormElement::text('price_input', 'Цена')->required(),
            AdminFormElement::hidden('price', 'Цена(грн)')

        );
    });
});
	// ->addMenuPage(Price::class, 300)
 //    ->setIcon('fa fa-sliders');