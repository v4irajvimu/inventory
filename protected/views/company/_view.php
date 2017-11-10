<?php
/* @var $this CompanyController */
/* @var $data Company */
?>


<div class="row datarow">

    <div class='col-sm-3 cells'>
	<?php echo $data['name']; ?>
</div>
<div class='col-sm-3 cells'>
	<?php echo $data['address']; ?>
</div>
<div class='col-sm-2 cells'>
	<?php echo $data['slogon']; ?>
</div>
<div class='col-sm-3 cells'>
	<?php echo $data['email']; ?>
</div>
<div class='col-sm-2 cells'>
	<?php echo $data['tp_1']; ?><br><?php echo $data['tp_2']; ?>
</div>
<div class='col-sm-2 cells'>
	<?php echo $data['fax']; ?>
</div>

    <div class='col-sm-1 cells btn-cog text-right'>
        <a class="Company-update" href="#" data-id="<?php echo $data['id']; ?>" model="Company" controler="CompanyController" data-toggle="tooltip" data-placement="top" title="Update"><span class="glyphicon glyphicon-cog"></span></a>
        <a class="Company-delete" href="#" data-id="<?php echo $data['id']; ?>" model="Company" controler="CompanyController" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-remove"></span></a>
    </div>

</div>
