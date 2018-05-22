<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Article;
use App\CatigorTop;

AdminSection::registerModel(Article::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Статьи');
    
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
            AdminFormElement::checkbox('visible', 'Показывать категорию в сайдбаре'),

            AdminFormElement::checkbox('baner', 'Показать в главном слайдере'),
            AdminFormElement::checkbox('toptwenty', 'Показать в верхнем слайдере'),
            AdminFormElement::checkbox('line', 'Показать в бегущей линии'),

            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::text('slug', 'Заголовок статьи транслитерацией'),
            AdminFormElement::select('id_catigories', 'Категория')->setModelForOptions(new CatigorTop)->setDisplay(function($CatigorTop) {
                return $CatigorTop->title;
            })->required(),

            AdminFormElement::textarea('keywords', 'Слова (фразы) по которым google будет искать эту статью')->required(),
            AdminFormElement::textarea('lid', 'Лид')->required(),
            AdminFormElement::ckeditor('text', 'Текст')->required(),
            AdminFormElement::date('date', 'Дата')->required(),
            AdminFormElement::datetime('datetime', 'Время публикации статьи')->required(),
            AdminFormElement::image('img', 'Изображение')->required()->setUploadSettings([
                'orientate' => [],
                'resize' => [850, NULL, function ($constraint) {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                }]
            ])





        );
    });
}) 
	->addMenuPage(Article::class, 300)
    ->setIcon('fa fa-sliders');