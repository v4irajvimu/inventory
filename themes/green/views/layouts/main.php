<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="language" content="en" />



  <?php
  date_default_timezone_set("Asia/Colombo");
  ?>
  <!-- Jquery and Boostrap JS Files -->
  <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
  <?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
  <?php Yii::app()->clientScript->registerCssFile(Yii::app()->clientScript->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css'); ?>
  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/bootstrap.min.js'); ?>



  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.form.js'); ?>
  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.validate.js'); ?>
  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.number.min.js'); ?>

  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.inputmask.js'); ?>
  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.inputmask.numeric.extensions.js'); ?>
  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.inputmask.date.extensions.js'); ?>
  <!-- Parsley JS-->
  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/parsley.min.js'); ?>

  <!-- CSS WIZARD JS-->
  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.wizard.js'); ?>

  <!-- Autocomplete JS-->
  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.autocomplete.js'); ?>

  <!-- Notify.js -->
  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/notify.js'); ?>

  <!-- Hicharts -->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts-3d.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>

  <!-- Bootstrap CSS 3.1.1 -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-theme.css" />


  <!-- Datepicker -->
  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.datetimepicker.js'); ?>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.datetimepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/theme.css" />


  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/timepicker.js'); ?>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/timepicker.css" />


  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jscolor/jscolor.js'); ?>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.php" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/custom.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.vertical-tabs.css" />

  <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery-te-1.4.0.js'); ?>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery-te-1.4.0.css" />

  <!-- Parsley CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/parsley.css" />

  <!-- CSS WIZARD CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.wizard.css" />

  <!-- Autocomplete CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.autocomplete.css" />
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <script>


  $(document).on("ready", function () {

    $(".datepicker").datetimepicker({
      timepicker: false,
      format: 'Y-m-d',
      closeOnDateSelect: true
    });
    $(".timepicker").datetimepicker({
      timepicker: true,
      datepicker: false,
      format: 'H:i:s',
      step: 30,
      closeOnDateSelect: true
    });

    $(".popup_menu").draggable();

    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();


  });

  $(document).on("click", "#exit", function () {
    $(this).parents("div.popup_menu").hide();
  })

  function showResponse(responseText, statusText, xhr, $form) {
    $("#err").html("");
    $("<p class='errp'>" + responseText + "</p>").appendTo("#err");
    $("#err").slideDown().delay(2400).fadeOut(function () {
      $("#err").html("");
      $("#err").clearQueue();
      $("#err").finish();
    });



  }

  function notifyMe(text,type){
    $.notify(text,
      { position:"right bottom",
      style: 'bootstrap',
      className: type
    }
  );

}

function loadWaiting(txt) {
  $("<p class='errp'>" + txt + "</p>").appendTo("#err");
  $("#err").slideDown();
}

function closeError() {
  $("#err").fadeOut();
  $("#err").html("");
}

</script>


</head>
<!-- Company Details  -->
<?php
$company = Company::model()->findAllByAttributes(array('online'=>'1'));
?>


<?php
if (Yii::app()->user->isGuest) {
  ?>
  <!--        <body>
  <div class="container-fluid">
  <div class="row">
  <div class="col-sm-6 col-sm-push-5">
  <h3>Admin Login</h3>
  <div class="panel panel-default " style="margin-top: 10px;">
  <div class="panel-heading"> Enter your your username and password</div>
  <div class="panel-body">
  <div class="form">
  <?php
  $model = new LoginForm();
  $form = $this->beginWidget('CActiveForm', array(
  'id' => 'login-form',
  'action' => Yii::app()->createUrl('site/login'),
  'enableClientValidation' => true,
  'clientOptions' => array(
  'validateOnSubmit' => true,
),
'htmlOptions' => array(
'role' => 'form'
)
));
?>


<div class="form">

<div class="form-group">
<?php echo $form->labelEx($model, 'username', array('class' => 'control-label')); ?>

<?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 150, 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'username'); ?>

</div>

<div class="form-group">
<?php echo $form->labelEx($model, 'password', array('class' => 'control-label')); ?>

<?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 150, 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'password'); ?>

</div>

<?php echo CHtml::submitButton('Login', array('class' => 'btn btn-success')); ?>

</div>


<?php $this->endWidget(); ?>
</div> form
</div>
</div>
</div>
</div>
</div>
</body>-->
<body>
  <style>
  .logininput{
    background: transparent;
outline: none !important;
border: transparent;
border-bottom: 1px #2d2eb3 solid;
color: black;
font-weight: bold;
  }

  ::-webkit-input-placeholder {
   color: white !important;
   line-height: 1.42857143;
   font-weight: bold;


}

:-moz-placeholder { /* Firefox 18- */
   color: white !important;
   line-height: 1.42857143;
   font-weight: bold;


}

::-moz-placeholder {  /* Firefox 19+ */
   color: white !important;
   line-height: 1.42857143;
   font-weight: bold;


}

:-ms-input-placeholder {
   color: white !important;
   line-height: 1.42857143;
   font-weight: bold;


}
  </style>
  <div class="container-fluid" style="height:100vh; background-image: url('<?php echo Yii::app()->request->baseUrl; ?>/images/mainbg.jpg'); background-repeat: no-repeat; background-size: 100% 100%; background-position: center;">
    <div class="row" style="margin-top: 19vh; ">
      <div class="col-sm-6 col-sm-push-5" style="border-radius:25px; box-shadow: 1px 1px 10px #292929; vertical-align: central; background-color:#cbcbcb89; padding:15px;">

      <h3 style="text-align: center; font-weight: bolder; font-size: 22px; color:white; ">PROWEB AUSTRALIA<br>INVENTORY MANAGEMENT SYSTEM</h3>
      <div class=" " style="margin-top: 10px;">

          <h4 style="text-align: center; font-size:15px; color:white;"><?=$company[0]['name']?></h4>
          <p style="text-align: center; font-size:10px; color:white; margin-top:-8px;"><?=$company[0]['address']?></p>
          <br>
          <div class="form" style="width:80%; margin:0 auto;">
            <?php
            $model = new LoginForm();
            $form = $this->beginWidget('CActiveForm', array(
              'id' => 'login-form',
              'action' => Yii::app()->createUrl('site/login'),
              'enableClientValidation' => true,
              'clientOptions' => array(
                'validateOnSubmit' => true,
              ),
              'htmlOptions' => array(
                'role' => 'form',
                'data-parsley-validate' => ''
              )
            ));
            ?>


            <div class="form">
              <?php if (Yii::app()->user->hasFlash('success')): ?>
                <div class="info" style="color:red; font-weight: bold;">
                  <?php echo Yii::app()->user->getFlash('success'); ?>
                </div>
              <?php endif; ?>
              <div class="form-group">
                <?php //echo $form->labelEx($model, 'username', array('class' => 'control-label')); ?>

                <?php echo $form->textField($model, 'username', array('size' => 60, 'required' => 'true', 'maxlength' => 150, 'class' => 'form-control logininput', 'placeholder' => 'Enter Username Here','autocomplete'=>"off")); ?>
                <?php echo $form->error($model, 'username'); ?>

              </div>

              <div class="form-group">
                <?php //echo $form->labelEx($model, 'password', array('class' => 'control-label')); ?>

                <?php echo $form->passwordField($model, 'password', array('size' => 60, 'required' => 'true', 'maxlength' => 150, 'class' => 'form-control logininput', 'placeholder' => 'Enter Password Here','autocomplete'=>"off")); ?>
                <?php echo $form->error($model, 'password'); ?>

              </div>
              <br>
              <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-primary btn-sm form-control')); ?>
              <br><br>
            </div>


            <?php $this->endWidget(); ?>
          </div><!-- form -->

      </div>
    </div>
  </div>
  <footer>
    <div style="text-align: center;">
      <?=$company[0]['name']?> &copy; 2017
      Developed by <a href="https://www.linkedin.com/in/virajvimu/" target="_blank">NGVVJ</a> Powered by Proweb Australa- 0424619833.
    </div>
  </footer>
</div>
</body>
<?php } else { ?>
  <body>
    <div>



      <!-- ERROR DIV -->
      <div id="err"></div>
      <!---   END ERROR DIV -->


      <!-- POP -->
      <div id="popupbgd"></div>
      <div id="popup" class="popup">

      </div>



      <header>
        <div class="container-fluid">

          <div class="row">

            <div class="col-sm-10">
              <h2> <?php echo Yii::app()->params['system_name']; ?></h2>
            </div>
            <div class="col-sm-2 text-right">
              <h2></h2>
            </div>
            <div class="col-sm-4 text-right">

              <h2>Welcome <?php echo Yii::app()->user->name; ?> !
                <a href="<?php echo Yii::app()->createUrl("site/logout"); ?>" style="text-decoration: none; color: white;">
                  <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/common/exit.png" style="width: 40px; height: 30px;"/> Logout
                </a>
              </h2>
            </div>
          </div>

        </div>
      </header>

      <section id="navigation">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-16 text-left">
              <!-- <h3><?php echo Yii::app()->params['company']; ?></h3> -->
              <a style="display:inline-block;" id="homelink"  href="<?php echo Yii::app()->user->returnUrl; ?>" >
                  <span class="glyphicon glyphicon-home"></span>
              </a>
              &emsp;
              <h3 style="display:inline-block;font-weight:bold;"><?=$company[0]['name']." | ".$company[0]['slogon']?></h3>
            </div>
          </div>
        </div>
      </section>
      <!--
      <section id="quick_nav">
      <div class="container-fluid">
      <div class="row">
      <div class="col-sm-16 text-left">
      <div class="btn-group" role="group" aria-label="...">
      <a href="http://www.sabaragamuwahanda.lk" class="btn btn-danger"><span class="glyphicon glyphicon-home"></span> Website Home</a>
      <a href="<?php echo Yii::app()->createUrl("news"); ?>" class="btn btn-default"><span class="glyphicon glyphicon-home"></span> Admin Panel Home</a>

    </div>
  </div>
</div>
</div>
</section>-->




<section style="margin-top: 90px; padding: 0px 15px; z-index: -1000;">
  <div class="container-fluid">
    <div class="row">
      <div id="content_body" class="col-sm-16" style="margin-bottom: 50px;">
        <?php echo $content; ?>
      </div>

    </div>
  </div>
</section>


        <footer>
    <div style="text-align: center;">
      <?=$company[0]['name']?> &copy; 2017
      Developed by <a href="https://www.linkedin.com/in/virajvimu/" target="_blank">NGVVJ</a> Powered by Proweb Australa- 0424619833.
    </div>
  </footer>

</div>
</body>
<?php } ?>



</html>
