<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Video;

AdminSection::registerModel(Video::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Видео');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),

        	AdminColumn::text('title')->setLabel('Название'),
            AdminColumn::text('date')->setLabel('Дата')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::checkbox('visible', 'Показывать название категории в сайдбаре'),

            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::text('slug', 'Слаг(Не обязателен для заполнения)'),
            AdminFormElement::textarea('video', 'Главное видео(iframe)')->required(),
            AdminFormElement::ckeditor('text', 'Текст')->required(),
            AdminFormElement::date('date', 'Дата')->required()
        );
    });
}) 
	->addMenuPage(Video::class, 300)
    ->setIcon('fa fa-sliders');