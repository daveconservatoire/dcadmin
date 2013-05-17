<?php

class LessonController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
		
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete'),
				'users'=>array('@'),
			),
	
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Lesson;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		


		if(isset($_POST['Lesson']))
		{
			$model->attributes=$_POST['Lesson'];
			if($model->save()) {
				include('twitter.class.php');
                include('twitter.secrets.php');
                $twitter = new Twitter($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
                $twitter->send('New Lesson: '.$model->title.' (daveconservatoire.org/lesson/'.$model->urltitle.')');
                $this->redirect(array('course/view','id'=>$model->seriesno));
				}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Lesson']))
		{
			$model->attributes=$_POST['Lesson'];
			if($model->save()) {
			    if(isset($_SESSION['accessToken'])){


$data='<?xml version="1.0"?>
<entry xmlns="http://www.w3.org/2005/Atom"
  xmlns:media="http://search.yahoo.com/mrss/"
  xmlns:yt="http://gdata.youtube.com/schemas/2007">
  <media:group>
    <media:title type="plain">'.$model->title.'</media:title>
    <media:description type="plain">A lesson from Dave Conservatoire called: '.$model->title.'</media:description>
    <media:category scheme="http://gdata.youtube.com/schemas/2007/categories.cat">Education</media:category>
    <media:keywords>music theory, music, online music lessons</media:keywords>
  </media:group>
  <yt:accessControl action="comment" permission="allowed"/>
  <yt:accessControl action="commentVote" permission="allowed"/>
  <yt:accessControl action="videoRespond" permission="allowed"/>
  <yt:accessControl action="rate" permission="allowed"/>
  <yt:accessControl action="list" permission="allowed"/>
  <yt:accessControl action="embed" permission="allowed"/>
  <yt:accessControl action="syndicate" permission="allowed"/>
</entry>';

$headers = array("PUT /feeds/api/users/default/uploads/".$model->youtubeid." HTTP/1.1",
"Host: gdata.youtube.com",
"Authorization: Bearer ".$_SESSION['accessToken'],
"GData-Version: 2",
"X-GData-Key: key=AI39si7NZmFxFOE7WyNLM6Y3HYQZ4fNWG7oPN34vfHePKMhzTXiD8WTPuW73eyjtTjUOHKH6wfQZt4xrQ6k3iydXcZv6MiqdaA",
"Content-length: ".strlen($data),
"Content-Type: application/atom+xml; charset=UTF-8");
$curl = curl_init("https://gdata.youtube.com/feeds/api/users/default/uploads/".$model->youtubeid);
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_TIMEOUT, 10);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_REFERER, true);
curl_setopt($curl, CURLOPT_HEADER, 0);
$returnxxx = curl_exec($curl);
curl_close($curl);
Yii::app()->user->setFlash('ytupdate', 'Youtube information successfully updated');

} else {
	Yii::app()->user->setFlash('ytupdate', 'There was a problem updating this video on Youtube');
}

				$this->redirect(array('course/view','id'=>$model->seriesno));
				}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Lesson');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Lesson('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Lesson']))
			$model->attributes=$_GET['Lesson'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Lesson the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Lesson::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Lesson $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='lesson-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
