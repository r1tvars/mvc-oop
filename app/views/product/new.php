<?php $this->start('head');?>
  <!-- Custom CSS & JS -->
<?php $this->end();?>

<?php $this->start('body');?>
<div class="container-fluid custom">
  <h2 class="product-title">Product add</h2>
  <input class="save-btn" type="submit" form="new">
</div>
<?php 
  $db = new DB();
  $data = $db->getCategory();
?>
<hr style="width: 90%;">
<div class="container">
  <div class="row">
    <div class="col-6 form-margin">
      <form id="new" method="POST" action="storeproducts" onsubmit="return validation()" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Name</label>
          <span id="name-warning" class="text-danger"> </span>
          <?php
            if(@$_GET['exists'] == true){
          ?>
            <span class="text-danger">*There already is a product with that name</span>
          <?php }?>
          <input type="text" class="form-control" id="name" name="name"><br>
        </div>
        <div class="form-group">
          <label for="">Price</label>
          <div class="form-group__double">
            <span id="price-warning" class="text-danger"> </span>
            <span id="currency-warning" class="text-danger"> </span>
          </div>
          <div class="form-group__double">
            <input type="text" class="form-control" id="price" name="price">
            <select id="currency" class="form-control" id="currency" name="currency">
              <option disabled selected value>Select currency</option>
                <option value="$">$</option>
                <option value="€">€</option>
                <option value="£">£</option>
            </select>
          </div>
        </div>
        <label for="">Category</label>
        <span id="type-warning" class="text-danger"> </span>
        <select id="type" class="form-control" name="type">
          <option disabled selected value>Select category</option>
          <?php foreach ($data as $key => $value): ?>
            <option id="discs" value="<?php echo $value['ID']; ?>"><?php echo $value['name']; ?></option>
          <?php endforeach ?>
        </select>
      </form>
    </div>
  </div>
</div>
<?php $this->end();?>