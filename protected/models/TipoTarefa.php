<?php

/**
 * This is the model class for table "tipoTarefa".
 *
 * The followings are the available columns in table 'tipoTarefa':
 * @property integer $id
 * @property string $nome
 * @property string $dataCriacao
 * @property string $dataModificacao
 *
 * The followings are the available model relations:
 * @property Tarefa[] $tarefas
 */
class TipoTarefa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TipoTarefa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipoTarefa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome', 'required'),
			array('nome', 'length', 'max'=>128),
			array('dataCriacao, dataModificacao', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nome, dataCriacao, dataModificacao', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'tarefas' => array(self::HAS_MANY, 'Tarefa', 'idTipoTarefa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nome' => 'Nome',
			'dataCriacao' => 'Data de Criação',
			'dataModificacao' => 'Data de Modificação',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('dataCriacao',$this->dataCriacao,true);
		$criteria->compare('dataModificacao',$this->dataModificacao,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave() {
		$this->dataModificacao = date("Y-m-d H:i:s");
		return parent::beforeSave();
	}

	public function getDataCriacao(){
		if($this->dataCriacao != null){
			$this->dataCriacao = Yii::app()->dateFormatter->format('HH:mm, dd/MM/yyyy',$this->dataCriacao);
		}
		return $this->dataCriacao;
	}

	public function getDataModificacao(){
		if($this->dataModificacao != null){
			$this->dataModificacao = Yii::app()->dateFormatter->format('HH:mm, dd/MM/yyyy',$this->dataModificacao);
		}
		return $this->dataModificacao;
	}

	public function removeTipoTarefa($id){
		$tipoTarefa = TipoTarefa::model()->findByPk($id);
		$count = Tarefa::model()->countByAttributes(array(
            'idTipoTarefa'=> $id
		));
		if($count==0)
			return "Deseja deletar a tarefa $tipoTarefa->nome.";
		else if($count==1)
			return "Deseja deletar a tarefa $tipoTarefa->nome, a mesma está selecionada em $count tarefa que também será apagada.";
		else
			return "Deseja deletar a tarefa $tipoTarefa->nome, a mesma está selecionada em $count tarefas que também serão apagadas.";	
	}
}