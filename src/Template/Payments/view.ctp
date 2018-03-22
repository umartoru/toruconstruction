<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Payments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="payments view col-lg-10 col-md-9 columns">
    <h2><?= h($payment->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Description') ?></h6>
                    <p><?= h($payment->description) ?></p>
                    <h6 class="subheader"><?= __('Voucher') ?></h6>
                    <p><?= h($payment->voucher) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($payment->id) ?></p>
                    <h6 class="subheader"><?= __('From Account') ?></h6>
                    <p><?= $this->Number->format($payment->from_account) ?></p>
                    <h6 class="subheader"><?= __('To Account') ?></h6>
                    <p><?= $this->Number->format($payment->to_account) ?></p>
                    <h6 class="subheader"><?= __('Amount') ?></h6>
                    <p><?= $this->Number->format($payment->amount) ?></p>
                    <h6 class="subheader"><?= __('Voucher No') ?></h6>
                    <p><?= $this->Number->format($payment->voucher_no) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Date') ?></h6>
                    <p><?= h($payment->date) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
