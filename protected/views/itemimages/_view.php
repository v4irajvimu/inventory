<?php
/* @var $this ItemimagesController */
/* @var $data Itemimages */
?>


<div class="row datarow">

    <div class='col-sm-2 cells'>
	<?php echo $data['name']; ?>
</div>
<div class='col-sm-2 cells'>
	<?php echo $data['ismain']; ?>
</div>
<div class='col-sm-2 cells'>
	<?php echo $data['item_id']; ?>
</div>
    
    <div class='col-sm-1 cells btn-cog text-right'>
        <a class="Itemimages-update" href="#" data-id="<?php echo $data['id']; ?>" model="Itemimages" controler="ItemimagesController" data-toggle="tooltip" data-placement="top" title="Update"><span class="glyphicon glyphicon-cog"></span></a>
        <a class="Itemimages-delete" href="#" data-id="<?php echo $data['id']; ?>" model="Itemimages" controler="ItemimagesController" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-remove"></span></a>
    </div>

</div>
