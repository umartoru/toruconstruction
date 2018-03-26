<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!--this script shows the bootstrap modal for adding a payment-->


<div class="modal fade" id="paymentModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Payment</h4>
        </div>
        <div class="modal-body">
        <?php  
            echo $this->Form->create($payment, [
            'url' => '/payments/add',
            'type' => 'file'
            ]);?>
         <?= $this->Form->create($payment, ['type' => 'file']); ?>
    <fieldset>
        <!--<legend><?= __('Add Payment') ?></legend>-->
        <?php
            echo $this->Form->input('from_account');
            echo $this->Form->input('to_account');
            echo $this->Form->input('description');
            echo $this->Form->input('amount');
            echo $this->Form->input('voucher_no');
            echo $this->Form->input('voucher', ['type' => 'file']);
            echo $this->Form->input('date');
        ?>
    </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
</div>