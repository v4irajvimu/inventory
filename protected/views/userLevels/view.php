<?php
/* @var $this UserLevelsController */
/* @var $model UserLevels */

$this->breadcrumbs=array(
	'User Levels'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List UserLevels', 'url'=>array('index')),
	array('label'=>'Create UserLevels', 'url'=>array('create')),
	array('label'=>'Update UserLevels', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserLevels', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserLevels', 'url'=>array('admin')),
);
?>

<h1>View UserLevels #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'online',
		'created',
	),
)); ?>
