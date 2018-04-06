<?php 
//echo $this->element('leftMenu');
?>
<div class="clients form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($client); ?>
    <fieldset>
        <legend><?= __('Add Client') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('details');
            echo $this->Form->input('Location');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
