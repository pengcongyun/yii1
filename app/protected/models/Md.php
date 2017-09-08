<?php

/**
 * This is the model class for table "md".
 *
 * The followings are the available columns in table 'md':
 * @property integer $Id
 * @property string $Iname
 * @property string $Sexy
 * @property integer $Age
 * @property string $CardNum
 * @property string $CourtName
 * @property string $AreaName
 * @property string $GistId
 * @property string $RegDate
 * @property string $CaseCode
 * @property string $GistUnit
 * @property string $Duty
 * @property string $Performance
 * @property string $DisruptTypeName
 * @property string $PublishDate
 */
class Md extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'md';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Age', 'numerical', 'integerOnly'=>true),
			array('Iname, CourtName, AreaName, GistId, CaseCode, GistUnit, Performance, DisruptTypeName, PublishDate', 'length', 'max'=>255),
			array('Sexy', 'length', 'max'=>16),
			array('CardNum', 'length', 'max'=>32),
			array('RegDate, Duty', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Iname, Sexy, Age, CardNum, CourtName, AreaName, GistId, RegDate, CaseCode, GistUnit, Duty, Performance, DisruptTypeName, PublishDate', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Iname' => '姓名',
			'Sexy' => '性别',
			'Age' => '年龄',
			'CardNum' => '身份证号码',
			'CourtName' => '执行法院',
			'AreaName' => '执行省份',
			'GistId' => '执行文号',
			'RegDate' => '立案时间',
			'CaseCode' => '案号',
			'GistUnit' => '执行依据单位',
			'Duty' => '生效法律文书确定的义务',
			'Performance' => '被执行人的履行情况',
			'DisruptTypeName' => '失信被执行人行为具体情形',
			'PublishDate' => '发布时间',
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

		$criteria->compare('Id',$this->Id);
		$criteria->compare('Iname',$this->Iname,true);
		$criteria->compare('Sexy',$this->Sexy,true);
		$criteria->compare('Age',$this->Age);
		$criteria->compare('CardNum',$this->CardNum,true);
		$criteria->compare('CourtName',$this->CourtName,true);
		$criteria->compare('AreaName',$this->AreaName,true);
		$criteria->compare('GistId',$this->GistId,true);
		$criteria->compare('RegDate',$this->RegDate,true);
		$criteria->compare('CaseCode',$this->CaseCode,true);
		$criteria->compare('GistUnit',$this->GistUnit,true);
		$criteria->compare('Duty',$this->Duty,true);
		$criteria->compare('Performance',$this->Performance,true);
		$criteria->compare('DisruptTypeName',$this->DisruptTypeName,true);
		$criteria->compare('PublishDate',$this->PublishDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Md the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
