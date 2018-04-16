<?php 
//echo $this->element('leftMenu');
?>
<div class="payments index col-lg-10 col-md-9 columns">
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('from_account') ?></th>
                <th><?= $this->Paginator->sort('to_account') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('amount') ?></th>
                <th><?= $this->Paginator->sort('voucher_no') ?></th>
                <th><?= $this->Paginator->sort('users_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($payments as $payment): ?>
            <tr>
                <td><?= $this->Number->format($payment->id) ?></td>
                    <td><?= $payment->fromAccount['name']?></td>
                    <td><?= $payment->toAccount['name'] ?></td>
                <td><?= $payment->description ?></td>
                    <td><?= $this->Number->format($payment->amount) ?></td>
                    <td><?= $this->Number->format($payment->voucher_no) ?></td>
                
                <td><?= $payment->user['username'] ?></td>
                    <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['action' => 'view', $payment->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $payment->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <? //$this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
                
            </tr>

        <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
        </ul>
            <?= $this->Paginator->numbers() ?>
        <ul class="pagination">
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <ul class="pagination">
            <li>
                <?echo $this->Html->link('Show Max',['controller' =>
                    'Payments', 'action' => 'index', 200]
                );?>
            </li>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
