<?php
/* @var $this ItemimagesController */
/* @var $dataProvider CActiveDataProvider */

?>

<!---- POPUP MENUES -->

<div id="Itemimages-popup" class="popup_menu" form-dragable="true">
    <div id="exit"><span class="glyphicon glyphicon-remove"></span></div>
    <div class="row">
        <div class="col-sm-16">
            <h2 id="Itemimages-formtitle" >Insert A New Record</h2>
            <div class="cus-form">
                <form action="<?php echo Yii::app()->createUrl('Itemimages/create') ?>" method="post" id="Itemimages-form">
                    <div class="row">
                        <div class="col-sm-16">
                            <label>Your Column Name</label>
                            <input type="text" id="name" name="name" class="form-control" />
                        </div>
                    </div>
                    <div class="row btn-row">
                        <div class="col-sm-16">
                            <button id="Itemimages-submitbtn" class="btn btn-default">Create</button>
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
        
        $("#Itemimages-form").ajaxForm({
            beforeSend: function () {
                
                return $("#Itemimages-form").validate({
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
                $("#Itemimages-form").resetForm();
                $("#Itemimages-add").attr("disabled", false);
                $.fn.yiiListView.update('Itemimages-list');                
                $("#Itemimages-popup").fadeOut();
                
            }
        });
        
    });    
    
    $(document).on("click","#Itemimages-add",function(){
        $("#Itemimages-formtitle").html("Insert A New Record");
        $("#Itemimages-submitbtn").html("Create");
        $("#Itemimages-form").resetForm();
        $("#Itemimages-form").attr("action", "<?php echo Yii::app()->createUrl('Itemimages/create') ?>");
        $("#Itemimages-popup").show();
    });    
    
    $(document).on("click",".Itemimages-update",function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        $("#Itemimages-formtitle").html("Update This Record");
        $("#Itemimages-submitbtn").html("Update");
        
        //Handle JSON DATA to Update FORM
        $.getJSON("<?php echo Yii::app()->createUrl('Itemimages/jsondata') ?>/" + id).done(function(data) {
            $.each(data, function(i, item) {
                $("#Itemimages-form #" + i).val(item);
            });
            $("#Itemimages-form").attr("action", "<?php echo Yii::app()->createUrl('Itemimages/update') ?>/" + id);
        });        
        
        $("#Itemimages-popup").show();
    });
    
    $(document).on("click",".Itemimages-delete",function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        var confirmdata = confirm("Are you sure, you want to delete this record ?");
        if(confirmdata == true){
        $.ajax({
            url : "<?php echo Yii::app()->createUrl('Itemimages/delete') ?>/"+id,
            type:"POST"
        }).done(function(data){
            $.fn.yiiListView.update('Itemimages-list'); 
        });
        }
    });
    
     $(document).on("click","#Itemimages-search_btn",function(){
        var searchtxt = $("#Itemimages-search_txt").val();
        $.fn.yiiListView.update('Itemimages-list', {
            //this entire js section is taken from admin.php. w/only this line diff
            data: {
                val: searchtxt,
                pages : $("#Itemimages-pages").val()
            }
        });
    });
    
     $(document).on("keyup","#Itemimages-search_txt",function(){
        var searchtxt = $("#Itemimages-search_txt").val();
        $.fn.yiiListView.update('Itemimages-list', {
            //this entire js section is taken from admin.php. w/only this line diff
            data: {
                val: searchtxt,
                pages : $("#Itemimages-pages").val()
            }
        });
    });
    
    $(document).on("change","#Itemimages-pages",function(){
        
        $.fn.yiiListView.update('Itemimages-list', {
            //this entire js section is taken from admin.php. w/only this line diff
            data: {
                val: $("#Itemimages-search_txt").val(),
                pages : $("#Itemimages-pages").val()
            }
        });
    });
    
    
</script>
<!-- //END SCRIPT -->



<div class="row">
    <div class="col-sm-16">
        <h2 class="header_topic" style="font-size: 20px;">Itemimages<br/>
            <span style="font-size: 14px; line-height: 16px;">Manage Itemimages with this Section. </span></h2>
    </div>
</div>

<div class="inner_nav">
<div class="row">
    <div class="col-sm-2">        
        <button id="Itemimages-add" data-model="Itemimages" class="btn btn-default btn-block btn-sm">Add <span class="glyphicon glyphicon-plus"></span></button>
    </div>
    <div class="col-sm-7">
        <div class="input-group">
            <input type="text" class="form-control" id="Itemimages-search_txt" name="search" placeholder="Search Itemimages ...." />
            
            <span class="input-group-btn">
                <button id="Itemimages-search_btn" class="btn btn-default">Search <span class="glyphicon glyphicon-search"></span></button>
            </span>
        </div>
    </div>
    <div class="col-sm-2 col-sm-push-5">
        <select id="Itemimages-pages" class="form-control">
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
    'id' => 'Itemimages-list',
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
