<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller\Component;

use Cake\Controller\Component;

class AuthorizeComponent extends Component
{
    public function isAuthorized($user)
    {
        // all users are allowed to view this controller
        return true;

        //return parent::isAuthorized($user);
    }
}

?>
