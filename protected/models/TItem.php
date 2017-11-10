<?php

/**
 * This is the model class for table "t_item".
 *
 * The followings are the available columns in table 't_item':
 * @property integer $id
 * @property string $cost
 * @property string $selling
 * @property integer $qty
 * @property string $created
 * @property string $item_code
 * @property string $name
 * @property integer $trans_type_id
 * @property integer $item_id
 * @property integer $online
 *
 * The followings are the available model relations:
 * @property Item $item
 * @property TransType $transType
 */
class TItem extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('trans_type_id, item_id', 'required'),
			array('qty, trans_type_id, item_id, online', 'numerical', 'integerOnly'=>true),
			array('cost, selling', 'length', 'max'=>10),
			array('item_code, name', 'length', 'max'=>45),
			array('created', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cost, selling, qty, created, item_code, name, trans_type_id, item_id, online', 'safe', 'on'=>'search'),
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
			'item' => array(self::BELONGS_TO, 'Item', 'item_id'),
			'transType' => array(self::BELONGS_TO, 'TransType', 'trans_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cost' => 'Cost',
			'selling' => 'Selling',
			'qty' => 'Qty',
			'created' => 'Created',
			'item_code' => 'Item Code',
			'name' => 'Name',
			'trans_type_id' => 'Trans Type',
			'item_id' => 'Item',
			'online' => 'Online',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('cost',$this->cost,true);
		$criteria->compare('selling',$this->selling,true);
		$criteria->compare('qty',$this->qty);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('item_code',$this->item_code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('trans_type_id',$this->trans_type_id);
		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('online',$this->online);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TItem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
