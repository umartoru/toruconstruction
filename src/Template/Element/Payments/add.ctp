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
            'type' => 'file',
            'id'    => 'payment'    
            ]);?>
         
    <fieldset>
        <!--<legend><?= __('Add Payment') ?></legend>-->
        <?php
            echo $this->Form->control('from_account', ['options' => $tree]);
            echo $this->Form->control('to_account', ['options' => $tree]);
            echo $this->Form->input('description');
            echo $this->Form->input('amount');
            echo $this->Form->input('voucher_no');
            echo $this->Form->input('voucher', ['type' => 'file']);
            echo $this->Form->input('date');
            echo $this->Form->hidden('users_id',['default' => $Auth->user('id')]);

        ?>
    </fieldset>
        </div>
        <div class="modal-footer">
             <button type="submit" class="btn btn-success pull-right">
                 <span class="glyphicon glyphicon-ok"></span> Submit</button>

    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
    <span class="glyphicon glyphicon-remove"></span> Cancel</button>        </div>
      </div>
      
    </div>
</div>


<!-- Modal for dialog yes no  -->
  <div class="modal fade" id="dialogModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Another</h4>
        </div>
        <div class="modal-body">
            <div>
                <br>
            <button type="button" onclick='$("#paymentModal").modal("show"); $("#dialogModal").modal("hide");' class="btn btn-success pull-right">
                 <span class="glyphicon glyphicon-ok"></span> Yes</button>
                 <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
                <span class="glyphicon glyphicon-remove"></span> No</button>
                <br>
            </div>      
        </div>
          <div class="modal-footer"><p>Note: do you want to save another payment to same account?</p></div>
      </div>
    </div>
  </div>
<script>
    $("#payment").submit(function(e) {

    var url = "payments/add/"; // the script where you handle the form input.
    var formData = new FormData($(this)[0]);
 

    $.ajax({
           type: "POST",
           url: url,
           data: formData, // serializes the form's elements.
           async: false,
           cache: false,
           contentType: false,
           processData: false,
           success: function(data)
           {
             //alert('Payment successfully saved'); // show response from the php script.
             $("#description").val('');
             $("#amount").val('');
             $("#voucher-no").val('');
             $("#voucher").val('');
             $("#paymentModal").modal("hide");
             $("#dialogModal").modal("show");
           }
         });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});
</script>
    