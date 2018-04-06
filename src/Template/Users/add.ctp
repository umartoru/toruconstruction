<?php 
//echo $this->element('leftMenu');
?>
<div class="users form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->control('role', [
            'options' => ['Accountant' => 'Accountant', 'CEO' => 'CEO', 'General Manager' => 'General Manager', 'Partner'=> 'Partner']
        ])
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
