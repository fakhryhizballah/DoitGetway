<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home - DoIt by Spairum',
            'validation' => \Config\Services::validation()
        ];
        return view('User/Home', $data);
    }


    //--------------------------------------------------------------------

}
