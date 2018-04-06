<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Payable'), ['action' => 'edit', $payable->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Payable'), ['action' => 'delete', $payable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payable->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Payables'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payable'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="payables view col-lg-10 col-md-9 columns">
    <h2><?= h($payable->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Description') ?></h6>
                    <p><?= h($payable->description) ?></p>
                    <h6 class="subheader"><?= __('Voucher') ?></h6>
                    <p><?= h($payable->voucher) ?></p>
                    <h6 class="subheader"><?= __('Status') ?></h6>
                    <p><?= h($payable->status) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($payable->id) ?></p>
                    <h6 class="subheader"><?= __('From Account') ?></h6>
                    <p><?= $this->Number->format($payable->from_account) ?></p>
                    <h6 class="subheader"><?= __('To Account') ?></h6>
                    <p><?= $this->Number->format($payable->to_account) ?></p>
                    <h6 class="subheader"><?= __('Amount') ?></h6>
                    <p><?= $this->Number->format($payable->amount) ?></p>
                    <h6 class="subheader"><?= __('Voucher No') ?></h6>
                    <p><?= $this->Number->format($payable->voucher_no) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Date') ?></h6>
                    <p><?= h($payable->date) ?></p>
                    <h6 class="subheader"><?= __('Due Date') ?></h6>
                    <p><?= h($payable->due_date) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
