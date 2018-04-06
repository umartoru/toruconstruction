<?php 
//echo $this->element('leftMenu');
?>

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
   url: "/newtoru/accounts/getTree",
   method:"POST",
   dataType: "json",       
   success: function(data)  
   {
    $('#tree').treeview({
    data: data,
    onNodeSelected: function(event, data) {
        $("#paymentModal").modal("show");       
        $("#to-account").val(data['id']);
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
