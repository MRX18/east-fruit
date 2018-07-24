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

        $display->setFilters(
            AdminDisplayFilter::related('id_market')->setModel(Market::class),
            AdminDisplayFilter::related('id_product')->setModel(Product::class),
            AdminDisplayFilter::related('id_specification')->setModel(Specification::class),
            AdminDisplayFilter::related('currency')->setModel(Currency::class),
            AdminDisplayFilter::related('price_input')->setModel(Price::class),
            AdminDisplayFilter::related('date')->setModel(Price::class)
        );

        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),

            $country = AdminColumn::text('Market.market', 'Страны')
                ->setHtmlAttribute('class', 'hidden-sm hidden-xs hidden-md')
                ->append(
                    AdminColumn::filter('id_market')
                ),

            $country = AdminColumn::text('Product.name', 'Категории')
                ->setHtmlAttribute('class', 'hidden-sm hidden-xs hidden-md')
                ->append(
                    AdminColumn::filter('id_product')
                ),

            $country = AdminColumn::text('Specification.title', 'Спецификация')
                ->setHtmlAttribute('class', 'hidden-sm hidden-xs hidden-md')
                ->append(
                    AdminColumn::filter('id_specification')
                ),

            $country = AdminColumn::text('Currency.currency', 'Валюта')
                ->setHtmlAttribute('class', 'hidden-sm hidden-xs hidden-md')
                ->append(
                    AdminColumn::filter('currency')
                ),

            $country = AdminColumn::text('price_input', 'Цена')
                ->setHtmlAttribute('class', 'hidden-sm hidden-xs hidden-md')
                ->append(
                    AdminColumn::filter('price_input')
                ),

            $country = AdminColumn::text('date', 'Дата')
                ->setHtmlAttribute('class', 'hidden-sm hidden-xs hidden-md')
                ->append(
                    AdminColumn::filter('date')
                ),
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