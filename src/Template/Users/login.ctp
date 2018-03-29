<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-md-offset-2">
    <?= $this->Form->create('Users/login') ?>
            <h2 class="form-signin-heading">Please Log In</h2>
            <?= $this->Form->control('username') ?>
            <?= $this->Form->control('password') ?>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <?= $this->Form->end() ?>
</div>