<?php $this->start('head');?>
 <!-- Additional <head> content -->
    <link rel="stylesheet" href="<?php PROOT ?>css/master.css">     
<?php $this->end();?>

<?php $this->start('body');?>

    <div class="container"style="margin-top:20%">
        <div class="row justify-content-center" >
            <div class="col-xs-8 link">
                <a href="<?php PROOT?>product/new">
                    <div class="center">Add a new product</div>
                </a>
            </div>

            <div class="col-xs-8 link">
                <a href="<?php PROOT?>product/list">
                    <div class="center">View product list</div>
                </a>
            </div>
            <div class="col-xs-8 link">
                <a href="<?php PROOT?>product/createcategory">
                    <div class="center">New Category</div>
                </a>
            </div>
        </div>
    </div>

<?php $this->end();?>
