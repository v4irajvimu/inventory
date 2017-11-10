<?php
/* @var $this ItemController */
/* @var $dataProvider CActiveDataProvider */

?>

<!---- POPUP MENUES -->

<div id="Item-popup" class="popup_menu" form-dragable="true">
    <div id="exit"><span class="glyphicon glyphicon-remove"></span></div>
    <div class="row">
        <div class="col-sm-16">
            <h2 id="Item-formtitle" >Insert A New Record</h2>
            <div class="cus-form">
                <form data-parsley-validate enctype="multipart/form-data"  action="<?php echo Yii::app()->createUrl('Item/create') ?>" method="post" id="Item-form">
                    <div class="row">
                        <div class="col-sm-3">
                            <label>Item Code</label>
                            <input type="text" id="itemcode" name="itemcode" class="form-control" required/>
                        </div>
                        <div class="col-sm-5">
                            <label>Item Name</label>
                            <input type="text" id="name" name="name" class="form-control" required/>
                        </div>
                        <div class="col-sm-8">
                            <label>Item Description</label>
                            <input type="text" id="description" name="description" class="form-control" required />
                        </div>
                    </div>
                    <div class="row">
<!--                        <div class="col-sm-4">
                            <label>Cost</label>
                            <input type="text" id="cost" name="cost" class="form-control" placeholder="00.00" required data-parsley-pattern="^[0-9]*\.[0-9]{2}$"/>
                        </div>
                        <div class="col-sm-4">
                            <label>Selling</label>
                            <input type="text" id="selling" name="selling" class="form-control" placeholder="00.00" required data-parsley-pattern="^[0-9]*\.[0-9]{2}$"/>
                        </div>-->
                        <div class="col-sm-4">
                            <label>Renew Qty.</label>
                            <input type="text" id="minQty" name="minQty" class="form-control"  required />
                        </div>
                    </div>
                    <div class="row btn-row">
                        <div class="col-sm-5">
                            <label>Item Image</label>
                            <input type="file"  name="thumb"  />
                        </div>
                    </div>
                    <div class="row btn-row">
                        <div class="col-sm-16">
                            <button id="Item-submitbtn" class="btn btn-default">Create</button>
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
    
    $(document).ready(function(){
        
        $("#Item-form").ajaxForm({
            beforeSend: function () {
                
                return $("#Item-form").validate({
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
                $("#Item-form").resetForm();
                $("#Item-add").attr("disabled", false);
                $.fn.yiiListView.update('Item-list');                
                $("#Item-popup").fadeOut();
                
            }
        });
        
    });    
    
    $(document).on("click","#Item-add",function(){
        $("#Item-formtitle").html("Insert A New Record");
        $("#Item-submitbtn").html("Create");
        $("#Item-form").resetForm();
        $("#Item-form").attr("action", "<?php echo Yii::app()->createUrl('Item/create') ?>");
        $("#Item-popup").show();
    });    
    
    $(document).on("click",".Item-update",function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        $("#Item-formtitle").html("Update This Record");
        $("#Item-submitbtn").html("Update");
        
        //Handle JSON DATA to Update FORM
        $.getJSON("<?php echo Yii::app()->createUrl('Item/jsondata') ?>/" + id).done(function(data) {
            $.each(data, function(i, item) {
                $("#Item-form #" + i).val(item);
            });
            $("#Item-form").attr("action", "<?php echo Yii::app()->createUrl('Item/update') ?>/" + id);
        });        
        
        $("#Item-popup").show();
    });
    
    $(document).on("click",".Item-delete",function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        var confirmdata = confirm("Are you sure, you want to delete this record ?");
        if(confirmdata == true){
        $.ajax({
            url : "<?php echo Yii::app()->createUrl('Item/delete') ?>/"+id,
            type:"POST"
        }).done(function(data){
            $.fn.yiiListView.update('Item-list'); 
        });
        }
    });
    
     $(document).on("click","#Item-search_btn",function(){
        var searchtxt = $("#Item-search_txt").val();
        $.fn.yiiListView.update('Item-list', {
            //this entire js section is taken from admin.php. w/only this line diff
            data: {
                val: searchtxt,
                pages : $("#Item-pages").val()
            }
        });
    });
    
     $(document).on("keyup","#Item-search_txt",function(){
        var searchtxt = $("#Item-search_txt").val();
        $.fn.yiiListView.update('Item-list', {
            //this entire js section is taken from admin.php. w/only this line diff
            data: {
                val: searchtxt,
                pages : $("#Item-pages").val()
            }
        });
    });
    
    $(document).on("change","#Item-pages",function(){
        
        $.fn.yiiListView.update('Item-list', {
            //this entire js section is taken from admin.php. w/only this line diff
            data: {
                val: $("#Item-search_txt").val(),
                pages : $("#Item-pages").val()
            }
        });
    });
    
    
</script>
<!-- //END SCRIPT -->



<div class="row">
    <div class="col-sm-16">
        <h2 class="header_topic" style="font-size: 20px;">Items<br/>
            <span style="font-size: 14px; line-height: 16px;">Manage Items with this Section. </span></h2>
    </div>
</div>

<div class="inner_nav">
<div class="row">
    <div class="col-sm-2">        
        <button id="Item-add" data-model="Item" class="btn btn-default btn-block btn-sm">Add <span class="glyphicon glyphicon-plus"></span></button>
    </div>
    <div class="col-sm-7">
        <div class="input-group">
            <input type="text" class="form-control" id="Item-search_txt" name="search" placeholder="Search Item ...." />
            
            <span class="input-group-btn">
                <button id="Item-search_btn" class="btn btn-default">Search <span class="glyphicon glyphicon-search"></span></button>
            </span>
        </div>
    </div>
    <div class="col-sm-2 col-sm-push-5">
        <select id="Item-pages" class="form-control">
            <option value="10">10 Pages</option>
            <option value="50">50 Pages</option>
            <option value="100">100 Pages</option>
        </select>
    </div>
</div>
</div>


<div class="container-fluid">

    <div class="row">
        <div class="col-sm-2 headerdiv">Item Code</div>
        <div class="col-sm-4 headerdiv">Item Name</div>
        <div class="col-sm-4 headerdiv">Item Description</div>
        <div class="col-sm-4 headerdiv">Image</div>
<!--        <div class="col-sm-1 headerdiv">Cost</div>
        <div class="col-sm-1 headerdiv">Selling</div>-->
        <div class="col-sm-1 headerdiv">Renew Qty.</div>
        <div class="col-sm-1 headerdiv">&nbsp;</div>
    </div>


<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'enablePagination' => true,
    'summaryText' => false,
    'id' => 'Item-list',
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
