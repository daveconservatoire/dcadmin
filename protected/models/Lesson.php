<?php

/**
 * This is the model class for table "Lesson".
 *
 * The followings are the available columns in table 'Lesson':
 * @property string $filetype
 * @property integer $id
 * @property integer $seriesno
 * @property integer $lessonno
 * @property string $title
 * @property string $urltitle
 * @property string $youtubeid
 * @property string $timestamp
 *
 * The followings are the available model relations:
 * @property UserVideoView[] $userVideoViews
 */
class Lesson extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Lesson the static model class
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
		return 'Lesson';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('seriesno, title, urltitle,description, keywords' , 'required'),
			array('seriesno, lessonno', 'numerical', 'integerOnly'=>true),
			array('filetype', 'length', 'max'=>1),
			array('title, urltitle', 'length', 'max'=>150),
			array('youtubeid', 'length', 'max'=>70),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('filetype, id, seriesno, lessonno, title, urltitle, youtubeid, timestamp', 'safe', 'on'=>'search'),
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
			'userVideoViews' => array(self::HAS_MANY, 'UserVideoView', 'lessonId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'filetype' => 'Lesson Type',
			'id' => 'ID',
			'seriesno' => 'Part of Course',
			'lessonno' => 'Lesson Number',
			'title' => 'Title',
			'urltitle' => 'Url Title',
			'youtubeid' => 'Youtube Id',
			'timestamp' => 'Timestamp',
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

		$criteria->compare('filetype',$this->filetype,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('seriesno',$this->seriesno);
		$criteria->compare('lessonno',$this->lessonno);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('urltitle',$this->urltitle,true);
		$criteria->compare('youtubeid',$this->youtubeid,true);
		$criteria->compare('timestamp',$this->timestamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}