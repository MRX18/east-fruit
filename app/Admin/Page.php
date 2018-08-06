<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Page;

AdminSection::registerModel(Page::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Статические страницы');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),

        	AdminColumn::text('title')->setLabel('Название'),
            AdminColumn::text('slug')->setLabel('Слаг')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::text('slug', 'Слаг')->required(),
            AdminFormElement::ckeditor('text', 'Текст')->required()
        );
    });
}) 
	->addMenuPage(Page::class, 300)
    ->setIcon('fa fa-sliders');