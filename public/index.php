<?php 

 include 'includes/header.php';

?>


<a href="index.php?cat=1"><p class="bg-primary" style="height:40px; width:100px;">Electronics</p></a>
<a href="index.php?cat=2"><p class="bg-primary" style="height:40px; width:100px;">Vehicles</p></a>
<a href="index.php?cat=3"><p class="bg-primary" style="height:40px; width:100px;">Books</p></a>
<a href="index.php?cat=4"><p class="bg-primary" style="height:40px; width:100px;">Fashion</p></a>
<a href="index.php?cat=5"><p class="bg-primary" style="height:40px; width:100px;">sports</p></a>



<div class="panel panel-info" style="margin-left:200px; margin-right:100px; margin-top:-250px;">
  <!-- Default panel contents -->
  <div class="panel-heading">Panel heading</div>
  <div class="panel-body">
  
  
  <?php  if(isset($_GET['cat']))
  
         { 
		   $cat = $_GET['cat'];
		   
		 }else $cat = "electronics"; 
		 
		 if(isset($_GET['search']))
		 {
			 
			 $s = $_GET['search'];
			 
			 $search_item = new queries;
			 $search_item->search($s);
			 $ctr = $search_item->query_num_rows;
		
		if($ctr !=0)
			{
			while($ctr != 0)
			{ 
			   $item = $search_item->query_run->fetch();
			 
		 ?>
  
  <?php if($ctr%4 == 1)
  {?>
  <br />
    <div style="width:200px; height:270px; border:1px solid blue">
    
     <img src="../uploads/images/products/<?php echo $item['code'];?>.jpg" style="width:200px; height:220px;" />
    
    <form action="productpage.php" method="get">
     <input type="text" name="p" value="<?php echo $item['product_id'];?>" hidden />
     <button type="submit" class="btn btn-info" style="margin-left:120px; margin-top:10px;">Details</button>
    </form>
    </div>
    <?php } ?>
    
    
  <?php if($ctr%4 == 2)
  {?>
    <div style="width:200px; height:270px; border:1px solid blue; margin-left:220px; margin-top:-270px;">
    
     <img src="../uploads/images/products/<?php echo $item['code'];?>.jpg" style="width:200px; height:220px;" />
    
    <form action="productpage.php" method="get">
     <input type="text" name="p" value="<?php echo $item['product_id'];?>" hidden />
     <button type="submit" class="btn btn-info" style="margin-left:120px; margin-top:10px;">Details</button>
    </form>
    </div>
   <?php } ?>
    
    
  <?php if($ctr%4 == 3)
  {?> 
    
    <div style="width:200px; height:270px; border:1px solid blue; margin-left:440px; margin-top:-270px;">
    
     <img src="../uploads/images/products/<?php echo $item['code'];?>.jpg" style="width:200px; height:220px;" />
    
    <form action="productpage.php" method="get">
     <input type="text" name="p" value="<?php echo $item['product_id'];?>" hidden />
     <button type="submit" class="btn btn-info" style="margin-left:120px; margin-top:10px;">Details</button>
    </form>
    </div>
    <?php } ?>
    
    
  <?php if($ctr%4 == 0)
  {?>
    
    <div style="width:200px; height:270px; border:1px solid blue; margin-left:660px; margin-top:-270px;">
    
     <img src="../uploads/images/products/<?php echo $item['code'];?>.jpg" style="width:200px; height:220px;" />
    
    <form action="productpage.php" method="get">
     <input type="text" name="p" value="<?php echo $item['product_id'];?>" hidden />
     <button type="submit" class="btn btn-info" style="margin-left:120px; margin-top:10px;">Details</button>
    </form>
    </div>
    
    <?php } $ctr--;}}else{?>
		
		
		
		
		NOT FOUND
		
		
		
		
		<?php }}else {
    
    
			 $search_item = new queries;
			 $search_item->cat_search($cat);
			 $ctr = $search_item->query_num_rows;
			
			while($ctr != 0)
			{ 
			   $item = $search_item->query_run->fetch();
			 
		 ?>
  
  <?php if($ctr%4 == 1)
  {?>
  <br />
    <div style="width:200px; height:270px; border:1px solid blue">
    
     <img src="../uploads/images/products/<?php echo $item['code'];?>.jpg" style="width:200px; height:220px;" />
    
    <form action="productpage.php" method="get">
     <input type="text" name="p" value="<?php echo $item['product_id'];?>" hidden />
     <button type="submit" class="btn btn-info" style="margin-left:120px; margin-top:10px;">Details</button>
    </form>
    </div>
    <?php } ?>
    
    
  <?php if($ctr%4 == 2)
  {?>
    <div style="width:200px; height:270px; border:1px solid blue; margin-left:220px; margin-top:-270px;">
    
     <img src="../uploads/images/products/<?php echo $item['code'];?>.jpg" style="width:200px; height:220px;" />
    
    <form action="productpage.php" method="get">
     <input type="text" name="p" value="<?php echo $item['product_id'];?>" hidden />
     <button type="submit" class="btn btn-info" style="margin-left:120px; margin-top:10px;">Details</button>
    </form>
    </div>
   <?php } ?>
    
    
  <?php if($ctr%4 == 3)
  {?> 
    
    <div style="width:200px; height:270px; border:1px solid blue; margin-left:440px; margin-top:-270px;">
    
     <img src="../uploads/images/products/<?php echo $item['code'];?>.jpg" style="width:200px; height:220px;" />
    
    <form action="productpage.php" method="get">
     <input type="text" name="p" value="<?php echo $item['product_id'];?>" hidden />
     <button type="submit" class="btn btn-info" style="margin-left:120px; margin-top:10px;">Details</button>
    </form>
    </div>
    <?php } ?>
    
    
  <?php if($ctr%4 == 0)
  {?>
    
    <div style="width:200px; height:270px; border:1px solid blue; margin-left:660px; margin-top:-270px;">
    
     <img src="../uploads/images/products/<?php echo $item['code'];?>.jpg" style="width:200px; height:220px;" />
    
    <form action="productpage.php" method="get">
     <input type="text" name="p" value="<?php echo $item['product_id'];?>" hidden />
     <button type="submit" class="btn btn-info" style="margin-left:120px; margin-top:10px;">Details</button>
    </form>
    </div>
    
    <?php } $ctr--;}} ?>
    
    
  </div>

</div>