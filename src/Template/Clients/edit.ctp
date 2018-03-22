<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $client->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $client->id), 'class' => 'btn-danger']
            )
        ?></li>
        <li><?= $this->Html->link(__('New Client'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="clients form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($client); ?>
    <fieldset>
        <legend><?= __('Edit Client') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('details');
            echo $this->Form->input('Location');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
