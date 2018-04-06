<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('New Payable'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Payables'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="payables form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($payable); ?>
    <fieldset>
        <legend><?= __('Add Payable') ?></legend>
        <?php
            echo $this->Form->input('from_account');
            echo $this->Form->input('to_account');
            echo $this->Form->input('description');
            echo $this->Form->input('amount');
            echo $this->Form->input('voucher_no');
            echo $this->Form->input('voucher');
            echo $this->Form->input('date');
            echo $this->Form->input('due_date');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
