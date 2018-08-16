<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Research;
use App\CatigorTop;

AdminSection::registerModel(Research::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Исследования');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setApply(function($query) {
            $query->OrderByDesc('id');
        });
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
            AdminFormElement::checkbox('visible', 'Показывать название подписи в сайдбаре'),

            AdminFormElement::checkbox('size', 'Большое иследование'),

            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::text('slug', 'Заголовок статьи транслитерацией'),

            AdminFormElement::text('signature', 'Подпись для актуального'),

            AdminFormElement::textarea('lid', 'Лид')->required(),
            AdminFormElement::date('date', 'Дата')->required(),
            AdminFormElement::datetime('datetime', 'Время публикации статьи')->required(),
            AdminFormElement::image('img', 'Изображение')->required()->setUploadSettings([
                'orientate' => [],
                'resize' => [850, NULL, function ($constraint) {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                }]
            ])

        )->setHtmlAttribute('enctype', 'multipart/form-data');
    });
}); 
	// ->addMenuPage(Research::class, 300)
 //    ->setIcon('fa fa-sliders');