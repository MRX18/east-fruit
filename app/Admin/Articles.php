<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Article;
use App\CatigorTop;

AdminSection::registerModel(Article::class, function (ModelConfiguration $model) {
//    $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Статьи');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),

        	AdminColumn::text('title')->setLabel('Назва'),
            AdminColumn::image('img')->setLabel('Зображення')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::checkbox('visible', 'Показывать категорию в сайдбаре'),

            AdminFormElement::checkbox('baner', 'Показать в главном слайдере'),
            AdminFormElement::checkbox('toptwenty', 'Показать в верхнем слайдере'),
            AdminFormElement::checkbox('line', 'Показать в бегающей линии'),

            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::select('id_catigories', 'Категорія')->setModelForOptions(new CatigorTop)->setDisplay(function($CatigorTop) {
                return $CatigorTop->title;
            })->required(),


            AdminFormElement::textarea('lid', 'Лид')->required(),
            AdminFormElement::ckeditor('text', 'Текс')->required(),
            AdminFormElement::date('date', 'Дата')->required(),
            AdminFormElement::image('img', 'Изображение')->required()
        );
    });
}) 
	->addMenuPage(Article::class, 300)
    ->setIcon('fa fa-sliders');