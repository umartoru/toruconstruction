<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active"><?= $this->Html->link(__('Cancle'), ['action' => 'view', $payment->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $payment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id), 'class' => 'btn-danger']
            )
        ?></li>
    </ul>
</div>
<div class="payments form col-lg-10 col-md-9 columns">
            <?php  
            echo $this->Form->create($payment, [
            'url' => '/payments/edit/'.$payment->id,
            'type' => 'file',
            'id'    => 'payment'    
            ]);?>
    <fieldset>
        <legend><?= __('Edit Payment') ?></legend>
        <?php
            echo $this->Form->input('from_account',['options'=>$tree]);
            echo $this->Form->input('to_account',['options'=>$tree]);
            echo $this->Form->input('description');
            echo $this->Form->input('amount');
            echo $this->Form->input('voucher_no');
            echo $this->Form->input('voucher', ['type' => 'file']);
            echo $this->Form->input('date');
            echo $this->Form->hidden('users_id',['default' => $Auth->user('id')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
<div class="payments form col-lg-10 col-md-9 columns">
    <legend><?= __('Voucher') ?></legend>
    <?= $this->Html->image('/files/Payments/voucher/'.$payment->voucher,['width' => '950px'])?>

</div>