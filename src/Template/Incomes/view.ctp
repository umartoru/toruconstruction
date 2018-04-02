<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Income'), ['action' => 'edit', $income->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Income'), ['action' => 'delete', $income->id], ['confirm' => __('Are you sure you want to delete # {0}?', $income->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Incomes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Income'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="incomes view col-lg-10 col-md-9 columns">
    <h2><?= h($income->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Account') ?></h6>
                    <p><?= $income->has('account') ? $this->Html->link($income->account->name, ['controller' => 'Accounts', 'action' => 'view', $income->account->id]) : '' ?></p>
                    <h6 class="subheader"><?= __('Description') ?></h6>
                    <p><?= h($income->description) ?></p>
                    <h6 class="subheader"><?= __('Voucher') ?></h6>
                    <p><?= h($income->voucher) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($income->id) ?></p>
                    <h6 class="subheader"><?= __('Amount') ?></h6>
                    <p><?= $this->Number->format($income->amount) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Date') ?></h6>
                    <p><?= h($income->date) ?></p>
                </div>
            </div>
        </div>
<div class="col-lg-9 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?= $this->Html->image('/files/Incomes/voucher/'.$income->voucher)?>
                </div>
                
            </div>
        </div>
    </div>
</div>
