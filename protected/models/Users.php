<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $name
 * @property string $nic
 * @property string $address
 * @property string $tp_fixed
 * @property string $tp_mobile
 * @property string $dob
 * @property string $created
 * @property string $last_logged
 * @property integer $online
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $company_id
 * @property integer $user_levels_id
 *
 * The followings are the available model relations:
 * @property Company $company
 * @property UserLevels $userLevels
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, user_levels_id', 'required'),
			array('online, company_id, user_levels_id', 'numerical', 'integerOnly'=>true),
			array('name, email', 'length', 'max'=>150),
			array('nic', 'length', 'max'=>45),
			array('address', 'length', 'max'=>255),
			array('tp_fixed, tp_mobile', 'length', 'max'=>15),
			array('username', 'length', 'max'=>50),
			array('password', 'length', 'max'=>200),
			array('dob, created, last_logged', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, nic, address, tp_fixed, tp_mobile, dob, created, last_logged, online, username, password, email, company_id, user_levels_id', 'safe', 'on'=>'search'),
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
			'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
			'userLevels' => array(self::BELONGS_TO, 'UserLevels', 'user_levels_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'nic' => 'Nic',
			'address' => 'Address',
			'tp_fixed' => 'Tp Fixed',
			'tp_mobile' => 'Tp Mobile',
			'dob' => 'Dob',
			'created' => 'Created',
			'last_logged' => 'Last Logged',
			'online' => 'Online',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'company_id' => 'Company',
			'user_levels_id' => 'User Levels',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('nic',$this->nic,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('tp_fixed',$this->tp_fixed,true);
		$criteria->compare('tp_mobile',$this->tp_mobile,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('last_logged',$this->last_logged,true);
		$criteria->compare('online',$this->online);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('user_levels_id',$this->user_levels_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
