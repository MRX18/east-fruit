<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Event;
use App\Yaer;
use App\EventCatigorie;

AdminSection::registerModel(Event::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('События');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),

        	AdminColumn::text('title')->setLabel('Название'),
            AdminColumn::text('adres')->setLabel('Адрес'),
            AdminColumn::text('date')->setLabel('Дата'),
            AdminColumn::image('img')->setLabel('Изображение')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(

            AdminFormElement::checkbox('visible', 'Показывать название подписи в сайдбаре'),

            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::select('id_catigor', 'Категория события')->setModelForOptions(new EventCatigorie)->setDisplay(function($EventCatigorie) {
                return $EventCatigorie->title;
            })->required(),
            AdminFormElement::text('signature', 'Подпись для актуального'),
            AdminFormElement::text('adres', 'Адрес')->required(),
            AdminFormElement::date('date', 'Дата события')->required(),
            AdminFormElement::select('year', 'Год события')->setModelForOptions(new Yaer)->setDisplay(function($Yaer) {
                return $Yaer->year;
            })->required(),
            AdminFormElement::ckeditor('description_media_report', 'Описание медиа-отчета'),
            AdminFormElement::image('img', 'Изображение')->required()
        );
    });
});
	// ->addMenuPage(Event::class, 300)
 //    ->setIcon('fa fa-sliders');