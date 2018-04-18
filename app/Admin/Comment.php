<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\ArticlesComment;
use App\Article;


AdminSection::registerModel(ArticlesComment::class, function (ModelConfiguration $model) {
//    $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Коментарии к статьям');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),
            AdminColumn::custom()->setLabel('Активность')->setCallback(function ($instance) {
                return $instance->visible ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
            })->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
        	AdminColumn::text('user')->setLabel('Пользоватьель'),
            AdminColumn::text('email')->setLabel('Email')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::checkbox('visible', 'Активность'),
            AdminFormElement::text('user', 'Пользоватьель')->setReadonly(true),
            AdminFormElement::text('email', 'Email')->setReadonly(true),
            AdminFormElement::select('id_articles', 'Статья')->setModelForOptions(new Article)->setDisplay(function($Article) {
                return $Article->title;
            })->setReadonly(true),


            AdminFormElement::textarea('text', 'Коментарий')->setReadonly(true)
        );
    });
}) 
	->addMenuPage(ArticlesComment::class, 300)
    ->setIcon('fa fa-sliders');