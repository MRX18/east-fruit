<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Article;
use App\CatigorTop;
use App\Market;

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
            AdminFormElement::checkbox('top', 'Всегда отображать статью в топе своей категории'),

            AdminFormElement::checkbox('visible', 'Показывать название подписи в сайдбаре'),

            AdminFormElement::checkbox('baner', 'Показать в главном слайдере'),
            AdminFormElement::checkbox('toptwenty', 'Показать в верхнем слайдере'),

            AdminFormElement::checkbox('line', 'Показать в бегущей линии'),

            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::text('slug', 'Заголовок статьи транслитерацией'),

            AdminFormElement::text('signature', 'Подпись для актуального'),

            AdminFormElement::select('id_catigories', 'Категория')->setModelForOptions(new CatigorTop)->setDisplay(function($CatigorTop) {
                return $CatigorTop->title;
            })->required(),
            AdminFormElement::select('id_country', 'Страна')->setModelForOptions(new Market)->setDisplay(function($Market) {
                return $Market->market;
            }),
            AdminFormElement::textarea('keywords', 'Слова (фразы) по которым google будет искать эту статью')->required(),
            AdminFormElement::textarea('lid', 'Лид')->required(),
            AdminFormElement::ckeditor('text', 'Текст')->required(),
            AdminFormElement::date('date', 'Дата')->required(),
            AdminFormElement::datetime('datetime', 'Время публикации статьи')->required(),
            AdminFormElement::upload('pdf', 'PDF файл к статье'),
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
//	->addMenuPage(Article::class, 300)
//    ->setIcon('fa fa-sliders');