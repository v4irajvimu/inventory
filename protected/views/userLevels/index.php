<?php
/* @var $this UserLevelsController */
/* @var $dataProvider CActiveDataProvider */

?>

<!---- POPUP MENUES -->

<div id="UserLevels-popup" class="popup_menu" form-dragable="true">
    <div id="exit"><span class="glyphicon glyphicon-remove"></span></div>
    <div class="row">
        <div class="col-sm-16">
            <h2 id="UserLevels-formtitle" >Insert A New Record</h2>
            <div class="cus-form">
                <form action="<?php echo Yii::app()->createUrl('UserLevels/create') ?>" method="post" id="UserLevels-form">
                    <div class="row">
                        <div class="col-sm-16">
                            <label>Your Column Name</label>
                            <input type="text" id="name" name="name" class="form-control" />
                        </div>
                    </div>
                    <div class="row btn-row">
                        <div class="col-sm-16">
                            <button id="UserLevels-submitbtn" class="btn btn-default">Create</button>
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
        
        $("#UserLevels-form").ajaxForm({
            beforeSend: function () {
                
                return $("#UserLevels-form").validate({
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
                $("#UserLevels-form").resetForm();
                $("#UserLevels-add").attr("disabled", false);
                $.fn.yiiListView.update('UserLevels-list');                
                $("#UserLevels-popup").fadeOut();
                
            }
        });
        
    });    
    
    $(document).on("click","#UserLevels-add",function(){
        $("#UserLevels-formtitle").html("Insert A New Record");
        $("#UserLevels-submitbtn").html("Create");
        $("#UserLevels-form").resetForm();
        $("#UserLevels-form").attr("action", "<?php echo Yii::app()->createUrl('UserLevels/create') ?>");
        $("#UserLevels-popup").show();
    });    
    
    $(document).on("click",".UserLevels-update",function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        $("#UserLevels-formtitle").html("Update This Record");
        $("#UserLevels-submitbtn").html("Update");
        
        //Handle JSON DATA to Update FORM
        $.getJSON("<?php echo Yii::app()->createUrl('UserLevels/jsondata') ?>/" + id).done(function(data) {
            $.each(data, function(i, item) {
                $("#UserLevels-form #" + i).val(item);
            });
            $("#UserLevels-form").attr("action", "<?php echo Yii::app()->createUrl('UserLevels/update') ?>/" + id);
        });        
        
        $("#UserLevels-popup").show();
    });
    
    $(document).on("click",".UserLevels-delete",function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        var confirmdata = confirm("Are you sure, you want to delete this record ?");
        if(confirmdata == true){
        $.ajax({
            url : "<?php echo Yii::app()->createUrl('UserLevels/delete') ?>/"+id,
            type:"POST"
        }).done(function(data){
            $.fn.yiiListView.update('UserLevels-list'); 
        });
        }
    });
    
     $(document).on("click","#UserLevels-search_btn",function(){
        var searchtxt = $("#UserLevels-search_txt").val();
        $.fn.yiiListView.update('UserLevels-list', {
            //this entire js section is taken from admin.php. w/only this line diff
            data: {
                val: searchtxt,
                pages : $("#UserLevels-pages").val()
            }
        });
    });
    
     $(document).on("keyup","#UserLevels-search_txt",function(){
        var searchtxt = $("#UserLevels-search_txt").val();
        $.fn.yiiListView.update('UserLevels-list', {
            //this entire js section is taken from admin.php. w/only this line diff
            data: {
                val: searchtxt,
                pages : $("#UserLevels-pages").val()
            }
        });
    });
    
    $(document).on("change","#UserLevels-pages",function(){
        
        $.fn.yiiListView.update('UserLevels-list', {
            //this entire js section is taken from admin.php. w/only this line diff
            data: {
                val: $("#UserLevels-search_txt").val(),
                pages : $("#UserLevels-pages").val()
            }
        });
    });
    
    
</script>
<!-- //END SCRIPT -->



<div class="row">
    <div class="col-sm-16">
        <h2 class="header_topic" style="font-size: 20px;">User Levels<br/>
            <span style="font-size: 14px; line-height: 16px;">Manage User Levels with this Section. </span></h2>
    </div>
</div>

<div class="inner_nav">
<div class="row">
    <div class="col-sm-2">        
        <button id="UserLevels-add" data-model="UserLevels" class="btn btn-default btn-block btn-sm">Add <span class="glyphicon glyphicon-plus"></span></button>
    </div>
    <div class="col-sm-7">
        <div class="input-group">
            <input type="text" class="form-control" id="UserLevels-search_txt" name="search" placeholder="Search UserLevels ...." />
            
            <span class="input-group-btn">
                <button id="UserLevels-search_btn" class="btn btn-default">Search <span class="glyphicon glyphicon-search"></span></button>
            </span>
        </div>
    </div>
    <div class="col-sm-2 col-sm-push-5">
        <select id="UserLevels-pages" class="form-control">
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
    'id' => 'UserLevels-list',
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
