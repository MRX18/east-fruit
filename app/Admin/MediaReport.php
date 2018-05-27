<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\MediaReport;
use App\Event;

AdminSection::registerModel(MediaReport::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Медиа-отчет');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),
            AdminColumn::text('MediaReportRelation.title')->setLabel('Событие'),

        	AdminColumn::text('title')->setLabel('Медиа-отчет'),
            AdminColumn::image('img')->setLabel('Изображение')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::text('title', 'Медиа-отчет')->required(),
            AdminFormElement::select('id_event', 'Событие')->setModelForOptions(new Event)->setDisplay(function($Event) {
                return $Event->title;
            })->required(),

            AdminFormElement::image('img', 'Изображение')->required()
        );
    });
});
	// ->addMenuPage(MediaReport::class, 300)
 //    ->setIcon('fa fa-sliders');