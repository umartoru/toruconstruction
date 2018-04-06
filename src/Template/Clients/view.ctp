<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Client'), ['action' => 'index']) ?> </li>
    </ul>
</div>
<div class="clients view col-lg-10 col-md-9 columns">
    <h2><?= h($client->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($client->name) ?></p>
                    <h6 class="subheader"><?= __('Details') ?></h6>
                    <p><?= h($client->details) ?></p>
                    <h6 class="subheader"><?= __('Location') ?></h6>
                    <p><?= h($client->Location) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($client->id) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
