<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Blog;
use App\User;

AdminSection::registerModel(Blog::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Блог');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),
            AdminColumn::text('id_user')->setLabel('ID пользователя'),

            AdminColumn::custom()->setLabel('Активность')->setCallback(function ($instance) {
                return $instance->visible ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
            })->setWidth('50px')->setHtmlAttribute('class', 'text-center'),

        	AdminColumn::text('title')->setLabel('Название')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::checkbox('visible', 'Опубликовать в блоге'),
            AdminFormElement::checkbox('catigor_visible', 'Показывать название категории в сайдбаре'),

            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::text('slug', 'Слаг'),
            AdminFormElement::select('id_user', 'Пользователь')->setModelForOptions(new User)->setDisplay(function($User) {
                return $User->name;
            })->required(),

            AdminFormElement::ckeditor('text', 'Текст')->required(),
            AdminFormElement::date('date', 'Дата')->required()
        );
    });
});
//	->addMenuPage(Blog::class, 300)
//    ->setIcon('fa fa-sliders');