<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active"><?= $this->Html->link(__('Cancle'), ['action' => 'view', $income->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $income->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $income->id), 'class' => 'btn-danger']
            )
        ?></li>
    </ul>
</div>
<div class="incomes form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($income); ?>
    <fieldset>
        <legend><?= __('Edit Income') ?></legend>
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
