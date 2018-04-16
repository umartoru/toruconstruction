<?php 
//echo $this->element('leftMenu');
?>
<div class="accounts form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($account); ?>
    <fieldset>
        <legend><?= __('Add Account') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');?>
            
            <div style="float:left"><input type="button" id="parent-account-name" value="Select Parent Account"></div>
            <div id="parent-account" ></div>
            <div style="clear:both"><br> </div>
            <?
            echo $this->Form->hidden('parent_id',['options'=> $parentAccounts]);
            echo $this->Form->hidden('lft');
            echo $this->Form->hidden('rght');
            echo $this->Form->input('status',['options' => ['Select Status','Active','Suspended','Disabled'],['value' => 'Active']]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>

<!-- Modal for dialog yes no  -->
  <div class="modal fade" id="dialogAccount" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Add Parent Account</h4>
        </div>
        <div class="modal-body">
            <div id="tree"></div>     
        </div>
      </div>
    </div>
  </div>
<script>
$( document ).ready(function() {
  $.ajax({ 
   url: "/newtoru/accounts/getTree/amount_expense",
   method:"POST",
   dataType: "json",       
   success: function(data)  
   {
    $('#tree').treeview({
    data: data,
    onNodeSelected: function(event, data) {       
        $("#parent-id").val(data['id']);
        $("#parent-account").html("&nbsp&nbsp&nbsp&nbsp <b>"+data['name']+"</b><br>");
        $("#dialogAccount").modal("hide");
            }
    });
    //alert('data');
   },   
   error: function(data)
   {
       alert('fail');
   }
 });
});    
$( "#parent-account-name" ).click(function(e) {
$("#dialogAccount").modal("show");});    
</script>