<?php
/* @var $this TransTypeController */
/* @var $model TransType */

$this->breadcrumbs=array(
	'Trans Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List TransType', 'url'=>array('index')),
	array('label'=>'Create TransType', 'url'=>array('create')),
	array('label'=>'Update TransType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TransType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TransType', 'url'=>array('admin')),
);
?>

<h1>View TransType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'online',
	),
)); ?>
