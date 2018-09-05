<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Create Usuario', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('usuario-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Tarefas</h1>

<p>
Opcionalmente você pode inserir os operadores de comparação antes de cara um de seus valores de busca para especificar o tipo de comparação que deve ser realizada.
</p>

<div class="teste" >
<li><b>&lt;</b>: Menor que.</li>
<li><b>&lt;=</b>: Menor ou igual.</li>
<li><b>&gt;</b>: Maior que.</li>
<li><b>&gt;=</b>: Maior ou igual.</li>
<li><b>&lt;&gt;</b>: Diferente.</li>
</div>


<?php echo CHtml::link('Busca Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nome',
		'sexo',
		'dataNascimento',
		/*array(
			'name'=>'dataNascimento',
			'value'=>$model->getDataNascimento(),
		),*/
		'email',
		'telefone',
		/*
		'login',
		'senha',
		'dataCriacao',
		'dataModificacao',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
