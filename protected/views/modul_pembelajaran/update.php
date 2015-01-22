<?php
/* @var $this Modul_pembelajaranController */
/* @var $model ModulPembelajaran */

$this->breadcrumbs=array(
	'Modul Pembelajaran'=>array('index'),
	$model->id_modul_pembelajaran=>array('view','id'=>$model->id_modul_pembelajaran),
	'Update',
);

$this->menu=array(
	array('label'=>'Data ModulPembelajaran', 'url'=>array('index')),
	array('label'=>'Tambah ModulPembelajaran', 'url'=>array('create')),
	array('label'=>'Detail ModulPembelajaran', 'url'=>array('view', 'id'=>$model->id_modul_pembelajaran)),
);
?>

<h3>Update ModulPembelajaran <?php echo $model->id_modul_pembelajaran; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>