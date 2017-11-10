<?php
/* @var $this TItemController */
/* @var $dataProvider CActiveDataProvider */

?>

<!---- POPUP MENUES -->

<div id="TItem-popup" class="popup_menu" form-dragable="true">
    <div id="exit"><span class="glyphicon glyphicon-remove"></span></div>
    <div class="row">
        <div class="col-sm-16">
            <h2 id="TItem-formtitle" >Insert A New Record</h2>
            <div class="cus-form">
                <form data-parsley-validate action="<?php echo Yii::app()->createUrl('TItem/create') ?>" method="post" id="TItem-form">
                    <div class="row">
                        <div class="col-sm-5">
                            <label>Item</label>
                            <select id="item_id" name="item_id" class="form-control" required>
                                <?php
                                $ItemsList = Item::model()->findAll();
                                foreach ($ItemsList as $item) {
                                    echo '<option value="' . $item->id . '">'. $item->itemcode." ". $item->name . '</option>';
                                }
                                ?>
                                
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label>Item</label>
                            <select id="trans_type_id" name="trans_type_id" class="form-control" required>
                                <?php
                                $TransTypesList = TransType::model()->findAll();
                                foreach ($TransTypesList as $item) {
                                    echo '<option value="' . $item->id . '">'. $item->name . '</option>';
                                }
                                ?>
                                
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label>Qty</label>
                            <input id="qty" name="qty" class="form-control" data-parsley-min="1" data-parsley-validstock="" required/>
                                
                        </div>
                        <div class="col-sm-3" id="availaleDiv" style="display: none;">
                            <br><span class="label label-danger">Available Stock</span>
                            <span class="badge" id="availaleCount">7</span>
                        </div>
                    </div>
                    <div class="row btn-row">
                        <div class="col-sm-16">
                            <button id="TItem-submitbtn" class="btn btn-default">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--- POPUP MENU END -->

<!--- Script -->
<script>
    window.Parsley.addValidator('validstock', {
        validateNumber: function(enterdValue, requiredValue, instance) {
            var isStockOut = parseInt($("#trans_type_id").val()) === 2;
            if(isStockOut){
                return parseInt(enterdValue) <= parseInt(requiredValue);
            }
            else{
                return true;
            }
          
        },
        requirementType: 'integer',
        messages: {
          en: 'Oops.. Not Enough Stock'
        }
      });
    $(document).ready(function(){
        
        $("#TItem-form").ajaxForm({
            beforeSend: function () {
                
                return $("#TItem-form").validate({
                    rules : {
                        name : {
                            required : true,
                        }
                    },
                    messages : {
                        name : {
                            max : "Customize Your Error"
                        }
                    }
                }).form();
                
            },
            success: showResponse,
            complete: function () {
                $("#TItem-form").resetForm();
                $("#TItem-add").attr("disabled", false);
                $.fn.yiiListView.update('TItem-list');                
                $("#TItem-popup").fadeOut();
                
            }
        });
        
    });    
    
    $(document).on("click","#TItem-add",function(){
        $("#TItem-formtitle").html("Insert A New Record");
        $("#TItem-submitbtn").html("Create");
        $("#TItem-form").resetForm();
        $("#TItem-form").attr("action", "<?php echo Yii::app()->createUrl('TItem/create') ?>");
        $("#TItem-popup").show();
        getAvailableQty($("#item_id").val());
    });    
    
    $(document).on("change", "#item_id", function(){
        getAvailableQty($(this).val());
    });
    $(document).on("click",".TItem-update",function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        $("#TItem-formtitle").html("Update This Record");
        $("#TItem-submitbtn").html("Update");
        
        //Handle JSON DATA to Update FORM
        $.getJSON("<?php echo Yii::app()->createUrl('TItem/jsondata') ?>/" + id).done(function(data) {
            $.each(data, function(i, item) {
                $("#TItem-form #" + i).val(item);
                if(i === "item_id"){
                    getAvailableQty($("#item_id").val());
                }
            });
            $("#TItem-form").attr("action", "<?php echo Yii::app()->createUrl('TItem/update') ?>/" + id);
        });        
        
        $("#TItem-popup").show();
        
    });
    
    $(document).on("click",".TItem-delete",function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        var confirmdata = confirm("Are you sure, you want to delete this record ?");
        if(confirmdata == true){
        $.ajax({
            url : "<?php echo Yii::app()->createUrl('TItem/delete') ?>/"+id,
            type:"POST"
        }).done(function(data){
            $.fn.yiiListView.update('TItem-list'); 
            getAvailableQty($("#item_id").val());
        });
        }
    });
    
     $(document).on("click","#TItem-search_btn",function(){
        var searchtxt = $("#TItem-search_txt").val();
        $.fn.yiiListView.update('TItem-list', {
            //this entire js section is taken from admin.php. w/only this line diff
            data: {
                val: searchtxt,
                pages : $("#TItem-pages").val()
            }
        });
    });
    
     $(document).on("keyup","#TItem-search_txt",function(){
        var searchtxt = $("#TItem-search_txt").val();
        $.fn.yiiListView.update('TItem-list', {
            //this entire js section is taken from admin.php. w/only this line diff
            data: {
                val: searchtxt,
                pages : $("#TItem-pages").val()
            }
        });
    });
    
    $(document).on("change","#TItem-pages",function(){
        
        $.fn.yiiListView.update('TItem-list', {
            //this entire js section is taken from admin.php. w/only this line diff
            data: {
                val: $("#TItem-search_txt").val(),
                pages : $("#TItem-pages").val()
            }
        });
    });
    
    function getAvailableQty(id){
        $("#availaleDiv").hide();
        $.ajax({
            url : "<?php echo Yii::app()->createUrl('TItem/getAvailable') ?>/"+id,
            type:"POST"
        }).done(function(data){
            if(data > 0 ){
                $("#availaleCount").html(data);
                $("#availaleDiv").fadeIn();
                $("#qty").attr("data-parsley-validstock", data);
            }else{
                $("#availaleCount").html('0');
                $("#availaleDiv").fadeIn();
                $("#qty").attr("data-parsley-validstock", "0");
            }
            
        });
    }
    
</script>
<!-- //END SCRIPT -->



<div class="row">
    <div class="col-sm-16">
        <h2 class="header_topic" style="font-size: 20px;">Titems<br/>
            <span style="font-size: 14px; line-height: 16px;">Manage Titems with this Section. </span></h2>
    </div>
</div>

<div class="inner_nav">
<div class="row">
    <div class="col-sm-2">        
        <button id="TItem-add" data-model="TItem" class="btn btn-default btn-block btn-sm">Add <span class="glyphicon glyphicon-plus"></span></button>
    </div>
    <div class="col-sm-7">
        <div class="input-group">
            <input type="text" class="form-control" id="TItem-search_txt" name="search" placeholder="Search TItem ...." />
            
            <span class="input-group-btn">
                <button id="TItem-search_btn" class="btn btn-default">Search <span class="glyphicon glyphicon-search"></span></button>
            </span>
        </div>
    </div>
    <div class="col-sm-2 col-sm-push-5">
        <select id="TItem-pages" class="form-control">
            <option value="10">10 Pages</option>
            <option value="50">50 Pages</option>
            <option value="100">100 Pages</option>
        </select>
    </div>
</div>
</div>


<div class="container-fluid">

    <div class="row">
        <div class="col-sm-3 headerdiv">Item Code</div>
        <div class="col-sm-5 headerdiv">Item Name</div>
<!--        <div class="col-sm-2 headerdiv">Cost</div>
        <div class="col-sm-2 headerdiv">Selling</div>-->
        <div class="col-sm-2 headerdiv">Trans. Type</div>
        <div class="col-sm-2 headerdiv">Qty</div>
        <div class="col-sm-2 headerdiv">Created</div>
        <div class="col-sm-1 headerdiv">&nbsp;</div>
    </div>


<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'enablePagination' => true,
    'summaryText' => false,
    'id' => 'TItem-list',
    'emptyTagName' => 'p',
    'emptyText' => '<span class="glyphicon glyphicon-file"></span> No Records  ',
    'itemsTagName' => 'div',
    'itemsCssClass' => 'container-fluid',
    'pagerCssClass' => 'pagination-div',
    'pager' => array(
    "header" => "",
    "htmlOptions" => array(
        "class" => "pagination pagination-sm"
        ),
        'selectedPageCssClass' => 'active',
        'nextPageLabel' => 'Next',
        'lastPageLabel' => 'Last',
        'prevPageLabel' => 'Previous',
        'firstPageLabel' => 'First',
        'maxButtonCount' => 10
        ),
    )); ?>

</div>
