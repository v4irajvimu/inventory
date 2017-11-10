<?php
/* @var $this TItemController */
/* @var $data TItem */
?>


<div class="row datarow">
        <div class='col-sm-3 cells'>
                <?php echo $data['item_code']; ?>
        </div>
        <div class='col-sm-5 cells'>
                <?php echo $data['name']; ?>
        </div>
<!--        <div class='col-sm-2 cells'>
                <?php echo $data['cost']; ?>
        </div>
        <div class='col-sm-2 cells'>
                <?php echo $data['selling']; ?>
        </div>-->
        <div class='col-sm-2 cells'>
                <?php  
                $transType = TransType::model()->findByPk($data['trans_type_id']);
                if($data['trans_type_id'] == 1){
                    echo "<span class=\"label label-primary\">".$transType->name."</span>";
                }
                else{
                    echo "<span class=\"label label-warning\">".$transType->name."</span>";
                }
                ?>
        </div>
        <div class='col-sm-2 cells'>
                <?php echo $data['qty']; ?>
        </div>
        <div class='col-sm-2 cells'>
                <?php echo $data['created']; ?>
        </div>
        <div class='col-sm-1 cells btn-cog text-right'>
            <a class="TItem-update" href="#" data-id="<?php echo $data['id']; ?>" model="TItem" controler="TItemController" data-toggle="tooltip" data-placement="top" title="Update"><span class="glyphicon glyphicon-cog"></span></a>
            <a class="TItem-delete" href="#" data-id="<?php echo $data['id']; ?>" model="TItem" controler="TItemController" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-remove"></span></a>
        </div>


    
    

</div>
