<?php
/* @var $this UserLevelsController */
/* @var $data UserLevels */
?>


<div class="row datarow">

    <div class='col-sm-2 cells'>
	<?php echo $data['name']; ?>
</div>
    
    <div class='col-sm-1 cells btn-cog text-right'>
        <a class="UserLevels-update" href="#" data-id="<?php echo $data['id']; ?>" model="UserLevels" controler="UserLevelsController" data-toggle="tooltip" data-placement="top" title="Update"><span class="glyphicon glyphicon-cog"></span></a>
        <a class="UserLevels-delete" href="#" data-id="<?php echo $data['id']; ?>" model="UserLevels" controler="UserLevelsController" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-remove"></span></a>
    </div>

</div>
