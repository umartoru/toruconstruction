<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('New Income'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Incomes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="incomes form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($income); ?>
    <fieldset>
        <legend><?= __('Add Income') ?></legend>
        <?php
            echo $this->Form->input('accounts_id', ['options' => $accounts]);
            echo $this->Form->input('amount');
            echo $this->Form->input('description');
            echo $this->Form->input('voucher');
            echo $this->Form->input('date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
