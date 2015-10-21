<?php

include 'includes/header.php';

$item = $_GET['p'];

$pro = new queries;
$pro->pro_search($item);

if($pro->query_num_rows != 0)
{    
	$item_p = $pro->query_run2->fetch();?>
	
	<img src="../uploads/images/products/<?php echo $pro->p['code'];?>.jpg" style="width:200px; height:220px;" />
    
	<br /><br />
    <?php echo $pro->p['name'];?><br>
    <?php echo $pro->p['price'];?><br>
    <?php echo $item_p['email'];?><br>
	
	
<?php	}else{?>
	
	
	NOT FOUND
	
	
	<?php } ?>