<?php
if(isset($_POST['place_order'])){
    $count = $_POST['order_count'];
    $j = 0;
    echo $count;
    echo "<br>";
    foreach($_POST['order_id'] as $order_id) { $order_id1[$j] = $order_id; echo $order_id1[$j]; $j++; echo "<br>"; } echo "<br><br>";
    $j = 0;
    foreach($_POST['quantity'] as $quantity) { $quantity1[$j] = $quantity; echo $quantity1[$j]; $j++; echo "<br>"; } echo "<br><br>";
    $j = 0;
    foreach($_POST['sub_total'] as $sub_total) { $sub_total1[$j] = $sub_total; echo $sub_total1[$j]; $j++; echo "<br>"; } echo "<br><br>";

    for($i=0; $i<$count; $i++){
        $order_id = $order_id1[$i];
        echo $order_id." I am here";
        echo $quantity1[$i];
        echo $sub_total1[$i];
        echo "<br>";
    }
}
?>