<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Account'), ['action' => 'edit', $account->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Account'), ['action' => 'delete', $account->id], ['confirm' => __('Are you sure you want to delete # {0}?', $account->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Accounts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Account'), ['controller' => 'Accounts', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="accounts view col-lg-10 col-md-9 columns">
    <h2><?= h($account->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($account->name) ?></p>
                    <h6 class="subheader"><?= __('Description') ?></h6>
                    <p><?= h($account->description) ?></p>
                    <h6 class="subheader"><?= __('Parent Account') ?></h6>
                    <p><?= $account->has('parent_account') ? $this->Html->link($account->parent_account->name, ['controller' => 'Accounts', 'action' => 'view', $account->parent_account->id]) : '' ?></p>
                    <h6 class="subheader"><?= __('Status') ?></h6>
                    <p><?= h($account->status) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($account->id) ?></p>
                    <h6 class="subheader"><?= __('Lft') ?></h6>
                    <p><?= $this->Number->format($account->lft) ?></p>
                    <h6 class="subheader"><?= __('Rght') ?></h6>
                    <p><?= $this->Number->format($account->rght) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Created') ?></h6>
                    <p><?= h($account->created) ?></p>
                    <h6 class="subheader"><?= __('Modified') ?></h6>
                    <p><?= h($account->modified) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related Accounts') ?></h4>
    <?php if (!empty($account->child_accounts)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Lft') ?></th>
                <th><?= __('Rght') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($account->child_accounts as $childAccounts): ?>
            <tr>
                <td><?= h($childAccounts->id) ?></td>
                <td><?= h($childAccounts->name) ?></td>
                <td><?= h($childAccounts->description) ?></td>
                <td><?= h($childAccounts->parent_id) ?></td>
                <td><?= h($childAccounts->lft) ?></td>
                <td><?= h($childAccounts->rght) ?></td>
                <td><?= h($childAccounts->created) ?></td>
                <td><?= h($childAccounts->modified) ?></td>
                <td><?= h($childAccounts->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'Accounts', 'action' => 'view', $childAccounts->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'Accounts', 'action' => 'edit', $childAccounts->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'Accounts', 'action' => 'delete', $childAccounts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childAccounts->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
