<?php 
//echo $this->element('leftMenu');
?>
<div class="accounts form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($account); ?>
    <fieldset>
        <legend><?= __('Add Account') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('parent_id', ['options' => $parentAccounts]);
            echo $this->Form->hidden('lft');
            echo $this->Form->hidden('rght');
            echo $this->Form->input('status',['options' => ['Select Status','Active','Suspended','Disabled'],['value' => 'Active']]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
