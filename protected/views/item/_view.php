<?php
/* @var $this ItemController */
/* @var $data Item */

$itemImageModel = Itemimages::model()->findByAttributes(array(
                            'item_id'=>$data['id'],
                            'ismain' => 1
                        ));
if($itemImageModel != null){
    $mageUrl = Yii::app()->baseUrl.'/images/items/'.$itemImageModel->name;
}
else{
    $mageUrl = Yii::app()->baseUrl.'/images/items/item_default.png';
}

?>


<div class="row datarow">
<div class='col-sm-2 cells'>
	<?php echo $data['itemcode']; ?>
</div>
    <div class='col-sm-4 cells'>
	<?php echo $data['name']; ?>
</div>
<div class='col-sm-4 cells'>
	<?php echo $data['description']; ?>
</div>
    <div class='col-sm-4 cells'>
        <image src="<?=$mageUrl?>" style="width: 120px; height: 180px;" />
</div>
<!--<div class='col-sm-1 cells'>
	<?php echo $data['cost']; ?>
</div>
<div class='col-sm-1 cells'>
	<?php echo $data['selling']; ?>
</div>-->

<div class='col-sm-1 cells'>
	<?php echo $data['minQty']; ?>
</div>
    
    <div class='col-sm-1 cells btn-cog text-right'>
        <a class="Item-update" href="#" data-id="<?php echo $data['id']; ?>" model="Item" controler="ItemController" data-toggle="tooltip" data-placement="top" title="Update"><span class="glyphicon glyphicon-cog"></span></a>
        <a class="Item-delete" href="#" data-id="<?php echo $data['id']; ?>" model="Item" controler="ItemController" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-remove"></span></a>
    </div>

</div>
