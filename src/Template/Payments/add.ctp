<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('New Payment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Payments'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="payments form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($payment, ['type' => 'file']); ?>
    <fieldset>
        <legend><?= __('Add Payment') ?></legend>
        <?php
            echo $this->Form->input('from_account');
            echo $this->Form->input('to_account');
            echo $this->Form->input('description');
            echo $this->Form->input('amount');
            echo $this->Form->input('voucher_no');
            echo $this->Form->input('voucher', ['type' => 'file']);
            echo $this->Form->input('date');
            echo $this->Form->hidden('users_id',['default' => $Auth->user('id')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
