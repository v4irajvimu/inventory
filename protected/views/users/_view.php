<?php
/* @var $this UsersController */
/* @var $data Users */
?>


<div class="row datarow">

<div class='col-sm-2 cells'>
	<?php echo $data['name']; ?>
</div>
<div class='col-sm-2 cells'>
	<?php echo $data['address']; ?>
</div>
    <div class='col-sm-2 cells'>
	<?php echo $data['nic']; ?>
</div>
<div class='col-sm-2 cells'>
	<?php echo $data['created']; ?>
</div>
<div class='col-sm-2 cells'>
	<?php echo $data['last_logged']; ?>
</div>

<div class='col-sm-3 cells'>
	<?php echo $data['tp_mobile']."<br>".$data['tp_fixed']; ?>
</div>
<div class='col-sm-2 cells'>
	<?php 
        echo UserLevels::model()->findByPk($data['user_levels_id'])->name; ?>
</div>
    
    <div class='col-sm-1 cells btn-cog text-right'>
        <a class="Users-update" href="#" data-id="<?php echo $data['id']; ?>" model="Users" controler="UsersController" data-toggle="tooltip" data-placement="top" title="Update"><span class="glyphicon glyphicon-cog"></span></a>
        <a class="Users-delete" href="#" data-id="<?php echo $data['id']; ?>" model="Users" controler="UsersController" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-remove"></span></a>
    </div>

</div>
