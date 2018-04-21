<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 $this->start('navbar.top');?>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Accounts
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><? echo $this->Html->link('New Account',['controller' => 'Accounts', 'action' => 'add']);?></li>
          <li><? echo $this->Html->link('List Account',['controller' => 'Accounts', 'action' => 'index']);?></li>
        </ul>
      </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Clients
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><? echo $this->Html->link('New Clients',['controller' => 'Clients', 'action' => 'add']);?></li>
          <li><? echo $this->Html->link('List Clients',['controller' => 'Clients', 'action' => 'index']);?></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Income
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><? echo $this->Html->link('Add Income',['controller' => 'Incomes', 'action' => 'newIncome']);?></li>
          <li><? echo $this->Html->link('List Income',['controller' => 'Incomes', 'action' => 'index']);?></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Payments
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><? echo $this->Html->link('New Payment',['controller' => 'Payments', 'action' => 'newPayment']);?></li>
          <li><? echo $this->Html->link('List Payments',['controller' => 'Payments', 'action' => 'index']);?></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Payables
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><? echo $this->Html->link('New Payables',['controller' => 'Payables', 'action' => 'add']);?></li>
          <li><? echo $this->Html->link('List Payables',['controller' => 'Payables', 'action' => 'index']);?></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Receivalbes
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><? echo $this->Html->link('New Receivables',['controller' => 'Receivables', 'action' => 'add']);?></li>
          <li><? echo $this->Html->link('List Receivables',['controller' => 'Receivables', 'action' => 'index']);?></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Projects
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><? echo $this->Html->link('New Project',['controller' => 'Projects', 'action' => 'add']);?></li>
          <li><? echo $this->Html->link('List Projects',['controller' => 'Projects', 'action' => 'index']);?></li>
        </ul>
      </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Users
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><? echo $this->Html->link('New User',['controller' => 'Users', 'action' => 'add']);?></li>
          <li><? echo $this->Html->link('List Users',['controller' => 'Users', 'action' => 'index']);?></li>
        </ul>
      </li>
    <?php $this->end();?>