<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Receivable'), ['action' => 'edit', $receivable->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Receivable'), ['action' => 'delete', $receivable->id], ['confirm' => __('Are you sure you want to delete # {0}?', $receivable->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Receivables'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Receivable'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="receivables view col-lg-10 col-md-9 columns">
    <h2><?= h($receivable->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Description') ?></h6>
                    <p><?= h($receivable->description) ?></p>
                    <h6 class="subheader"><?= __('Voucher') ?></h6>
                    <p><?= h($receivable->voucher) ?></p>
                    <h6 class="subheader"><?= __('Status') ?></h6>
                    <p><?= h($receivable->status) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($receivable->id) ?></p>
                    <h6 class="subheader"><?= __('From Account') ?></h6>
                    <p><?= $this->Number->format($receivable->from_account) ?></p>
                    <h6 class="subheader"><?= __('To Account') ?></h6>
                    <p><?= $this->Number->format($receivable->to_account) ?></p>
                    <h6 class="subheader"><?= __('Amount') ?></h6>
                    <p><?= $this->Number->format($receivable->amount) ?></p>
                    <h6 class="subheader"><?= __('Voucher No') ?></h6>
                    <p><?= $this->Number->format($receivable->voucher_no) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Date') ?></h6>
                    <p><?= h($receivable->date) ?></p>
                    <h6 class="subheader"><?= __('Due Date') ?></h6>
                    <p><?= h($receivable->due_date) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
