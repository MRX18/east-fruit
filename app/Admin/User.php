<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\User;

AdminSection::registerModel(User::class, function (ModelConfiguration $model) {
//    $model->enableAccessCheck();
    $model->setTitle('Пользователи');
    // Запрет на создание
//    $model->disableCreating();
    // Запрет на удаление
//    $model->disableDeleting();
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables();
        $display->setApply(function($query) {
            $query->where('id', '!=', '9');
        });
        $display->setColumns([
            AdminColumn::text('name')->setLabel('Name'),
            AdminColumn::email('email')->setLabel('Email'),
            AdminColumn::lists('roles.name', 'Роли')->append(AdminColumn::filter('roles.display_name')),
            AdminColumn::text('created_at')->setLabel('created_at')
        ]);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function($id = null) {
        $form = AdminForm::panel();

        $tabs = AdminDisplay::tabbed([
            'User info' => new \SleepingOwl\Admin\Form\FormElements([
                AdminFormElement::text('name', 'Name User')->required(),
                AdminFormElement::text('email', 'Email')->required()->unique(),
                AdminFormElement::multiselect('theroles', 'Роли')->setModelForOptions('App\Role')->setDisplay('display_name')
            ]),
            'Account' => new \SleepingOwl\Admin\Form\FormElements([
            ]),

        ]);
        $form->addElement($tabs);

        return $form;
    });
});
//    ->addMenuPage(User::class, 0)
//    ->setIcon('fa fa-user');