<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li id="newAccounts" class=""> <?= $this->Html->link(__('New Account'), ['controller' => 'Accounts','action' => 'add']) ?></li>
        <li id="listAccounts" class=""><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts','action' => 'index']) ?></li>
        <li id="newClients" class=""><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
        <li id="listClients" class=""><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li id="newIncomes" class=""><?= $this->Html->link(__('New Income'), ['controller' => 'Incomes', 'action' => 'newIncome']) ?> </li>
        <li id="listIncomes" class=""><?= $this->Html->link(__('List Income'), ['controller' => 'Incomes', 'action' => 'index']) ?> </li>
        <li id="newPayments" class=""> <?= $this->Html->link(__('New Payment'), ['controller' => 'Payments','action' => 'newPayment']) ?></li>
        <li id="listPayments" class=""><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?> </li>
        <li id="newProjects" class=""><?= $this->Html->link(__('New Project'), ['controller' => 'Projects','action' => 'add']) ?></li>
        <li id="listProjects" class=""><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects','action' => 'index']) ?></li>
        <li id="newUsers" class=""><?= $this->Html->link(__('New User'), ['controller' => 'Users','action' => 'add']) ?></li>
        <li id="listUsers" class=""><?= $this->Html->link(__('List Users'), ['controller' => 'Users','action' => 'index']) ?></li>
        
    </ul>
</div>

<script>
    $(document).ready(function(){
        var page = $(location).attr('pathname');
        //alert(page);
        var res = page.split("/");
        var len = res.length;
        len = len -1;
        if(res[len] =='accounts')
            $('#listAccounts').addClass('active disabled');
        else if(res[len-1] == 'accounts' & res[len] == 'add')
            $('#newAccounts').addClass('active disabled'); 
        else if (res[len] == 'clients')
            $('#listClients').addClass('active disabled');
        else if(res[len-1] == 'clients' & res[len] == 'add')
            $('#newClients').addClass('active disabled');
        else if (res[len] == 'incomes')
            $('#listIncomes').addClass('active disabled');
        else if(res[len-1] == 'incomes' & res[len] == 'new-income')
            $('#newIncomes').addClass('active disabled');
        else if (res[len] == 'payments')
            $('#listPayments').addClass('active disabled');
        else if(res[len-1] == 'payments' & res[len] == 'new-payment')
            $('#newPayments').addClass('active disabled');
        else if (res[len] == 'projects')
            $('#listProjects').addClass('active disabled');
        else if(res[len-1] == 'projects' & res[len] == 'add')
            $('#newProjects').addClass('active disabled');
        else if (res[len] == 'users')
            $('#listUsers').addClass('active disabled');
        else if(res[len-1] == 'users' & res[len] == 'add')
            $('#newUsers').addClass('active disabled');

    
});
</script>