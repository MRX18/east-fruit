<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AdminSection;
use App\User;

class EastfruitController extends Controller
{
    public function eastfruit() {
        $_user = new User;
        $users = $_user->eastfruit();

        $data = ['users' => $users];

        return AdminSection::view(view('admin.comand-eastfruit', $data), 'Команда East-Fruit');
    }

    public function user($id) {
        $_user = new User;

        $user = $_user->user($id);
        return AdminSection::view(view('admin.user-eastfruit'), 'Команда East-Fruit');
    }
}
