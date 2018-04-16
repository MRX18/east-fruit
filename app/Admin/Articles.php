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
            AdminColumn::custom()->setLabel('Активность')->setCallback(function ($instance) {
                return $instance->visible ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
            })->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
        	AdminColumn::text('title')->setLabel('Назва'),
            AdminColumn::image('img')->setLabel('Зображення')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::checkbox('visible', 'Активность'),
            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::select('id_catigories', 'Категорія')->setModelForOptions(new CatigorTop)->setDisplay(function($CatigorTop) {
                return $CatigorTop->title;
            })->required(),


            AdminFormElement::ckeditor('text', 'Текс')->required(),
            AdminFormElement::date('date', 'Дата')->required(),
            AdminFormElement::image('img', 'Изображение')->required()
        );
    });
}) 
	->addMenuPage(Article::class, 300)
    ->setIcon('fa fa-sliders');