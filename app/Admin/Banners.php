<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Banners;

AdminSection::registerModel(Banners::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Реклама');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),

            AdminColumn::image('img')->setLabel('Изображение')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::image('img', 'Изображение')->required()
        );
    });
}) 
	->addMenuPage(Banners::class, 300)
    ->setIcon('fa fa-sliders');