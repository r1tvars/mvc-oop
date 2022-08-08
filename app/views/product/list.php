<?php $this->start('head');?>
  <!-- Custom CSS & JS -->
<?php $this->end();?>

<?php $this->start('body');?>
<div class="container-fluid custom">
  <h2 class="product-title">Product list</h2>
  <button id="del" type="button" onclick="del()" class="delete-btn">Delete</button>  
</div>
<hr style="width: 90%;">
<div class="container justify-content-center" style="margin-bottom: 50px;">
  <div class="row justify-content-start">

  <?php 
  $db = new DB();
  $data = $db->index();
  // dnd($data);
  
  ?>
  <?php
    foreach ($data as $key => $value) { ?>
      <div class="col-xl-3 col-lg-3 col-md-5 col-sm-5 grid">
        <input type="checkbox" name="<?php //echo $value['type'];?>" value="<?php echo $value['ID'];?>" style="float: left; border: 1px solid black;"><br>
          <p><?php echo $value['name']; ?></p>
          <p><?php echo $value['price'];?> <?php echo $value['currency'];?></p>
    </div>
  <?php } ?>
 
  
  
</div>
<?php $this->end();?>