<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Event;
use App\Yaer;

AdminSection::registerModel(Event::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('События');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),

        	AdminColumn::text('title')->setLabel('Назва'),
            AdminColumn::text('adres')->setLabel('Адрес'),
            AdminColumn::text('date')->setLabel('Дата'),
            AdminColumn::image('img')->setLabel('Зображення')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(

            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::text('adres', 'Адрес')->required(),
            AdminFormElement::date('date', 'Дата события')->required(),
            AdminFormElement::select('year', 'Год события')->setModelForOptions(new Yaer)->setDisplay(function($Yaer) {
                return $Yaer->year;
            })->required(),
            AdminFormElement::image('img', 'Изображение')->required()
        );
    });
});
	// ->addMenuPage(Event::class, 300)
 //    ->setIcon('fa fa-sliders');