<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="projects view col-lg-10 col-md-9 columns">
    <h2><?= h($project->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($project->name) ?></p>
                    <h6 class="subheader"><?= __('Status') ?></h6>
                    <p><?= h($project->status) ?></p>
                    <h6 class="subheader"><?= __('Status Description') ?></h6>
                    <p><?= h($project->status_description) ?></p>
                    <h6 class="subheader"><?= __('Location') ?></h6>
                    <p><?= h($project->location) ?></p>
                    <h6 class="subheader"><?= __('Client') ?></h6>
                    <p><?= $project->has('client') ? $this->Html->link($project->client->name, ['controller' => 'Clients', 'action' => 'view', $project->client->id]) : '' ?></p>
                    <h6 class="subheader"><?= __('Project Cost') ?></h6>
                    <p><?= h($project->project_cost) ?></p>
                    <h6 class="subheader"><?= __('Completion Cost') ?></h6>
                    <p><?= h($project->completion_cost) ?></p>
                    <h6 class="subheader"><?= __('Agrement Status') ?></h6>
                    <p><?= h($project->agrement_status) ?></p>
                    <h6 class="subheader"><?= __('Ts Status') ?></h6>
                    <p><?= h($project->ts_status) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($project->id) ?></p>
                    <h6 class="subheader"><?= __('Project Bid Cost') ?></h6>
                    <p><?= $this->Number->format($project->project_bid_cost) ?></p>
                    <h6 class="subheader"><?= __('Additional Security') ?></h6>
                    <p><?= $this->Number->format($project->additional_security) ?></p>
                    <h6 class="subheader"><?= __('Duration') ?></h6>
                    <p><?= $this->Number->format($project->duration) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Start Date') ?></h6>
                    <p><?= h($project->start_date) ?></p>
                    <h6 class="subheader"><?= __('End Date') ?></h6>
                    <p><?= h($project->end_date) ?></p>
                    <h6 class="subheader"><?= __('Work Order Date') ?></h6>
                    <p><?= h($project->work_order_date) ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row texts">
        <div class="columns col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Description') ?></h6>
                    <?= $this->Text->autoParagraph(h($project->description)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
