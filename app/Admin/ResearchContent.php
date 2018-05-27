<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\ResearchContent;
use App\Research;

AdminSection::registerModel(ResearchContent::class, function (ModelConfiguration $model) {
   $model->enableAccessCheck();
//     Запрет на удаление
//    $model->disableDeleting();
    $model->setTitle('Контент исследования');
    
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setApply(function($query) {
            $query->OrderByDesc('id');
        });
        $display->setColumns([
        	AdminColumn::text('id')->setLabel('ID'),
            AdminColumn::text('id_research')->setLabel('ID исследования'),

        	AdminColumn::text('title')->setLabel('Название'),
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::select('id_research', 'Главное исследование')->setModelForOptions(new Research)->setDisplay(function($Research) {
                return $Research->title;
            })->required(),

            AdminFormElement::ckeditor('text', 'Текст')->required(),
            AdminFormElement::upload('pdf', 'PDF файл к статье')

        )->setHtmlAttribute('enctype', 'multipart/form-data');
    });
});
	// ->addMenuPage(ResearchContent::class, 300)
 //    ->setIcon('fa fa-sliders');