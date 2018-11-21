<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="payments index col-lg-10 col-md-9 columns">
    <div class="table-responsive">
        <? 
        echo $this->Form->create('Payment');
        echo $this->Form->control('Select Account', ['options' => $tree]);
        echo $this->Form->submit('Submit');
        echo $this->Form->end();
        ?>
<table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Voucher No</th>
                <th>Account</th>
                <th>Amount</th>
            </tr>
        </thead>
<?php
 $sum=0;        
foreach($descendants as $accounts){
    
    //echo $accounts->name."<br>";  
   
    foreach ($accounts->accounts_to as $payment){
         echo "<tr>";        
        echo "<td>".$payment->id."</td>";
        echo "<td>".$payment->voucher_no."</td>";
        echo "<td>".$accounts->name."</td>";
        echo "<td>".$payment->amount."</td>";
        echo "</tr>"; 
        $sum += $payment->amount;
    }
    
}
?>
        <tr>
            <td><b>Total</b></td>
            <td></td>
            <td></td>
            <td><b><?=$sum?></b></td>
        </tr>
</table>
    </div>
</div>