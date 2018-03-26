<?php 

?>
<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li> <?= $this->Html->link(__('New Account'), ['action' => 'add']) ?></li>
        <li class="active disabled"><?= $this->Html->link(__('List Accounts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Account'), ['controller' => 'Accounts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payments'), ['controller' => 'Payments', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="accounts index col-lg-10 col-md-9 columns">
    <div class="table-responsive">
        <table class="table table-striped">
        
        <tbody>
         <div id="tree"></div>
         <div>
             
             
         </div>
        </tbody>
        </table>
    </div>
    
</div>
<?php echo $this->element('Payments/add');?>

<script>
    $( document ).ready(function() {
  $.ajax({ 
   url: "accounts/getTree",
   method:"POST",
   dataType: "json",       
   success: function(data)  
   {
    $('#tree').treeview({
    data: data,
    onNodeSelected: function(event, data) {
        $("#paymentModal").modal("show");       
        alert(data['id']);
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
</script>
