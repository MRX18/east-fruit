<?php
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Application;


AdminSection::registerModel(Application::class, function (ModelConfiguration $model) {
    $model->enableAccessCheck();
    $model->disableCreating();

    $model->setTitle('Заявки');
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setColumns([
            AdminColumn::text('id')->setLabel('ID'),
            AdminColumn::custom()->setLabel('Активность')->setCallback(function ($instance) {
                return $instance->unread ? '<i class="fa fa-check bg-success"></i>' : '<i class="fa fa-minus text-danger bg-danger"></i>';
            })->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::text('name')->setLabel('Імя'),
            AdminColumn::text('email')->setLabel('Email')
        ]);
        return $display;
    });
    
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::checkbox('unread', 'Просмотрено'),
            AdminFormElement::text('name', 'Им\'я')->setReadonly(true),
            AdminFormElement::text('email', 'Email')->setReadonly(true),
            AdminFormElement::textarea('text', 'Текст')->setReadonly(true)
        );
    });
}) 
	->addMenuPage(Application::class, 300)
    ->setIcon('fa fa-sliders')
    ->addBadge(function() {
        $count = Application::where('unread', false)->count();
        if ($count > 0) {
            return $count;
        }
    }, ['class' => 'label-warning']);