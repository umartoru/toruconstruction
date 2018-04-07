<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Payments'), ['action' => 'index']) ?> </li>
    </ul>
</div>
<div class="payments view col-lg-10 col-md-9 columns">
    <h2>Voucher  <?= $this->Number->format($payment->voucher_no) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <b><?= __('ID:   ') ?></b>
                    <?= $this->Number->format($payment->id) ?><br>
                    <b><?= __('From Account:   ') ?></b>
                    <?= $payment->fromAccount['name'] ?>
                    <h6 class="subheader"><?= __('To Account') ?></h6>
                    <p><?= $payment->toAccount['name'] ?></p>
                    <h6 class="subheader"><?= __('Amount') ?></h6>
                    <p><?= $this->Number->format($payment->amount) ?></p>
                    <h6 class="subheader"><?= __('Description') ?></h6>
                    <p><?= h($payment->description) ?></p>
                    <h6 class="subheader"><?= __('Voucher') ?></h6>
                    <p><?= h($payment->voucher) ?></p>
                    <h6 class="subheader"><?= __('Date') ?></h6>
                    <p><?= h($payment->date) ?></p>
                    <h6 class="subheader"><?= __('User Name') ?></h6>
                    <p><?= h($payment->user['username']) ?></p>
                </div>
                
            </div>
        </div>
<div class="col-lg-9 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?= $this->Html->image('/files/Payments/voucher/'.$payment->voucher,['width' => '950px'])?>
                </div>
                
            </div>
        </div>
    </div>
</div>