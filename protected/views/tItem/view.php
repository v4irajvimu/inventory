<?php
/* @var $this TItemController */
/* @var $model TItem */

$this->breadcrumbs=array(
	'Titems'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List TItem', 'url'=>array('index')),
	array('label'=>'Create TItem', 'url'=>array('create')),
	array('label'=>'Update TItem', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TItem', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TItem', 'url'=>array('admin')),
);
?>

<h1>View TItem #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cost',
		'selling',
		'qty',
		'created',
		'item_code',
		'name',
		'trans_type_id',
		'item_id',
		'online',
	),
)); ?>
