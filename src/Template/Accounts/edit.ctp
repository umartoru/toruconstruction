<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active"><?= $this->Html->link(__('Cancle'), ['action' => 'view', $account->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $account->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $account->id), 'class' => 'btn-danger']
            )
        ?></li>
    </ul>
</div>
<div class="accounts form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($account); ?>
    <fieldset>
        <legend><?= __('Edit Account') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');?>
            
            <div style="float:left"><input type="button" id="parent-account-name" value="Select Parent Account"></div>
            <div id="parent-account" ></div>
            <div style="clear:both"><br> </div>
            <?
            echo $this->Form->hidden('parent_id',['id'=>'parent-id']);
            echo $this->Form->hidden('lft');
            echo $this->Form->hidden('rght');
            echo $this->Form->input('status');
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