<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Image;

AdminSection::registerModel(Image::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Фотогалерея');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),

        	AdminColumn::text('title')->setLabel('Название'),
            AdminColumn::image('img')->setLabel('Изображение')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::checkbox('visible', 'Показывать название категории в сайдбаре'),

            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::image('img', 'Главное изображение')->required(),
            AdminFormElement::ckeditor('text', 'Текст')->required(),
            AdminFormElement::textarea('lid', 'Лид')->required(),
            AdminFormElement::images('images', 'Галерея изображений')->storeAsJson()->required(),
            AdminFormElement::date('date', 'Дата')->required(),
            AdminFormElement::datetime('datetime', 'Время публикации статьи')->required()
        );
    });
}) 
	->addMenuPage(Image::class, 300)
    ->setIcon('fa fa-sliders');