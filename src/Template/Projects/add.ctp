<?php 
//echo $this->element('leftMenu');
?>
<div class="projects form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($project); ?>
    <fieldset>
        <legend><?= __('Add Project') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('start_date');
            echo $this->Form->input('end_date');
            echo $this->Form->input('status');
            echo $this->Form->input('status_description');
            echo $this->Form->input('location');
            echo $this->Form->input('clients_id', ['options' => $clients]);
            echo $this->Form->input('project_cost');
            echo $this->Form->input('project_bid_cost');
            echo $this->Form->input('completion_cost');
            echo $this->Form->input('additional_security');
            echo $this->Form->input('duration');
            echo $this->Form->input('work_order_date');
            echo $this->Form->input('agrement_status');
            echo $this->Form->input('ts_status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
