<?php 
echo $this->element('leftMenu');
?>
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
