<?php $this->start('head');?>
  <!-- Custom CSS & JS -->
<?php $this->end();?>

<?php $this->start('body');?>
<div class="container-fluid custom">
  <h2 class="product-title">Product add</h2>
  <input class="save-btn" type="submit" form="new">
</div>
<hr style="width: 90%;">
<div class="container">
  <div class="row">
    <div class="col-6 form-margin">
      <form id="new" method="POST" action="createnewcategory" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Category name</label>
          <input type="text" class="form-control" id="sku" name="name"><br>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $this->end();?>