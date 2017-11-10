<?php
/* @var $this TransTypeController */
/* @var $dataProvider CActiveDataProvider */

?>

<!---- POPUP MENUES -->

<div id="TransType-popup" class="popup_menu" form-dragable="true">
    <div id="exit"><span class="glyphicon glyphicon-remove"></span></div>
    <div class="row">
        <div class="col-sm-16">
            <h2 id="TransType-formtitle" >Insert A New Record</h2>
            <div class="cus-form">
                <form action="<?php echo Yii::app()->createUrl('TransType/create') ?>" method="post" id="TransType-form">
                    <div class="row">
                        <div class="col-sm-16">
                            <label>Your Column Name</label>
                            <input type="text" id="name" name="name" class="form-control" />
                        </div>
                    </div>
                    <div class="row btn-row">
                        <div class="col-sm-16">
                            <button id="TransType-submitbtn" class="btn btn-default">Create</button>
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
        
        $("#TransType-form").ajaxForm({
            beforeSend: function () {
                
                return $("#TransType-form").validate({
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
                $("#TransType-form").resetForm();
                $("#TransType-add").attr("disabled", false);
                $.fn.yiiListView.update('TransType-list');                
                $("#TransType-popup").fadeOut();
                
            }
        });
        
    });    
    
    $(document).on("click","#TransType-add",function(){
        $("#TransType-formtitle").html("Insert A New Record");
        $("#TransType-submitbtn").html("Create");
        $("#TransType-form").resetForm();
        $("#TransType-form").attr("action", "<?php echo Yii::app()->createUrl('TransType/create') ?>");
        $("#TransType-popup").show();
    });    
    
    $(document).on("click",".TransType-update",function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        $("#TransType-formtitle").html("Update This Record");
        $("#TransType-submitbtn").html("Update");
        
        //Handle JSON DATA to Update FORM
        $.getJSON("<?php echo Yii::app()->createUrl('TransType/jsondata') ?>/" + id).done(function(data) {
            $.each(data, function(i, item) {
                $("#TransType-form #" + i).val(item);
            });
            $("#TransType-form").attr("action", "<?php echo Yii::app()->createUrl('TransType/update') ?>/" + id);
        });        
        
        $("#TransType-popup").show();
    });
    
    $(document).on("click",".TransType-delete",function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        var confirmdata = confirm("Are you sure, you want to delete this record ?");
        if(confirmdata == true){
        $.ajax({
            url : "<?php echo Yii::app()->createUrl('TransType/delete') ?>/"+id,
            type:"POST"
        }).done(function(data){
            $.fn.yiiListView.update('TransType-list'); 
        });
        }
    });
    
     $(document).on("click","#TransType-search_btn",function(){
        var searchtxt = $("#TransType-search_txt").val();
        $.fn.yiiListView.update('TransType-list', {
            //this entire js section is taken from admin.php. w/only this line diff
            data: {
                val: searchtxt,
                pages : $("#TransType-pages").val()
            }
        });
    });
    
     $(document).on("keyup","#TransType-search_txt",function(){
        var searchtxt = $("#TransType-search_txt").val();
        $.fn.yiiListView.update('TransType-list', {
            //this entire js section is taken from admin.php. w/only this line diff
            data: {
                val: searchtxt,
                pages : $("#TransType-pages").val()
            }
        });
    });
    
    $(document).on("change","#TransType-pages",function(){
        
        $.fn.yiiListView.update('TransType-list', {
            //this entire js section is taken from admin.php. w/only this line diff
            data: {
                val: $("#TransType-search_txt").val(),
                pages : $("#TransType-pages").val()
            }
        });
    });
    
    
</script>
<!-- //END SCRIPT -->



<div class="row">
    <div class="col-sm-16">
        <h2 class="header_topic" style="font-size: 20px;">Trans Types<br/>
            <span style="font-size: 14px; line-height: 16px;">Manage Trans Types with this Section. </span></h2>
    </div>
</div>

<div class="inner_nav">
<div class="row">
    <div class="col-sm-2">        
        <button id="TransType-add" data-model="TransType" class="btn btn-default btn-block btn-sm">Add <span class="glyphicon glyphicon-plus"></span></button>
    </div>
    <div class="col-sm-7">
        <div class="input-group">
            <input type="text" class="form-control" id="TransType-search_txt" name="search" placeholder="Search TransType ...." />
            
            <span class="input-group-btn">
                <button id="TransType-search_btn" class="btn btn-default">Search <span class="glyphicon glyphicon-search"></span></button>
            </span>
        </div>
    </div>
    <div class="col-sm-2 col-sm-push-5">
        <select id="TransType-pages" class="form-control">
            <option value="10">10 Pages</option>
            <option value="50">50 Pages</option>
            <option value="100">100 Pages</option>
        </select>
    </div>
</div>
</div>


<div class="container-fluid">

    <div class="row">
        <div class="col-sm-15 headerdiv">Your Column Name</div>
        <div class="col-sm-1 headerdiv">&nbsp;</div>
    </div>


<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'enablePagination' => true,
    'summaryText' => false,
    'id' => 'TransType-list',
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
