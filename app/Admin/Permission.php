<?php
/**
 * Created by PhpStorm.
 * User: Vitalik
 * Date: 02.10.2016
 * Time: 19:59
 */

use Illuminate\Pagination\PaginationServiceProvider;
use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Permission;

AdminSection::registerModel(Permission::class, function (ModelConfiguration $model) {

    $model->enableAccessCheck();

    $model->setTitle('Права доступа');

    $model->onDisplay(function () {
        $display = AdminDisplay::datatables()->setColumns([
            AdminColumn::text('name')->setLabel('Name'),
            AdminColumn::text('display_name')->setLabel('Display name'),
            AdminColumn::text('description')->setLabel('Description'),
        ]);
        $display->paginate(10);
        return $display;
    });
    // Create And Edit
    $model->onCreateAndEdit(function() {
        return $form = AdminForm::panel()->addBody(
            AdminFormElement::text('name', 'Name')->required(),
            AdminFormElement::text('display_name', 'Display name')->required(),
            AdminFormElement::textarea('description', 'Description')->required()
        );
        return $form;
    });

});
//    ->addMenuPage(Permission::class, 0)
//    ->setIcon('fa fa-key');