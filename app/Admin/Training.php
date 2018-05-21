<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Training;

AdminSection::registerModel(Training::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Обучающие поездки');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),

        	AdminColumn::text('title')->setLabel('Название'),
            AdminColumn::text('adres')->setLabel('Адрес'),
            AdminColumn::image('img')->setLabel('Изображение')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(

            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::text('adres', 'Адрес')->required(),
            AdminFormElement::date('date', 'Дата учебной поездки')->required(),
            AdminFormElement::image('img', 'Изображение')->required()
        );
    });
})
	->addMenuPage(Training::class, 300)
    ->setIcon('fa fa-sliders');