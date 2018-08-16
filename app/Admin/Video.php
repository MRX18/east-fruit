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
            AdminFormElement::checkbox('visible', 'Показывать название подписи в сайдбаре'),
            AdminFormElement::checkbox('video_view', 'Поставьте галочку если загружаите видео через iframe и не ставьте галочку если загружаите с ПК'),

            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::text('slug', 'Слаг(Не обязателен для заполнения)'),
            AdminFormElement::text('signature', 'Подпись для актуального'),
            AdminFormElement::image('video_img', 'Изображение видео')->required(),
            AdminFormElement::textarea('video_iframe', 'Главное видео(iframe)'),
            AdminFormElement::upload('video', 'Загрузить видео'),
            AdminFormElement::upload('pdf', 'Загрузить pdf'),
            AdminFormElement::ckeditor('text', 'Текст')->required(),
            AdminFormElement::date('date', 'Дата')->required(),
            AdminFormElement::datetime('datetime', 'Время публикации статьи')->required()
        )->setHtmlAttribute('enctype', 'multipart/form-data');
    });
}) 
	->addMenuPage(Video::class, 300)
    ->setIcon('fa fa-sliders');