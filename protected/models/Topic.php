<?php

/**
 * This is the model class for table "Topic".
 *
 * The followings are the available columns in table 'Topic':
 * @property integer $id
 * @property string $title
 * @property string $colour
 * @property integer $courseId
 * @property integer $sortorder
 */
class Topic extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Topic the static model class
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
		return 'Topic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, courseId', 'required'),
			array('courseId, sortorder', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>300),
			array('colour', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, colour, courseId, sortorder', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'title' => 'Title',
			'colour' => 'Colour',
			'courseId' => 'Course',
			'sortorder' => 'Sortorder',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('colour',$this->colour,true);
		$criteria->compare('courseId',$this->courseId);
		$criteria->compare('sortorder',$this->sortorder);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}