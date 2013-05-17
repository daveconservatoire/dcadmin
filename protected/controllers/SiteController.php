<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

		/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) 
				$this->redirect('https://accounts.google.com/o/oauth2/auth?scope=https://gdata.youtube.com&state=profile&redirect_uri=http://localhost:8888/dcadmin/site/oauthcallback&response_type=code&client_id=368669799271.apps.googleusercontent.com&access_type=');
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
		public function actionProcess()
	{
	$position=0;
		foreach ($_GET['listItem'] as $position => $item) :
    $position=$position+1;
    Lesson::model()->updateByPk($item, array('lessonno'=>$position));  
    endforeach;
    echo "List order updated";
	}
	
	public function actionProcessplaylist()
	{
	$position=0;
		foreach ($_GET['listItem'] as $position => $item) :
    $position=$position+1;
    PlaylistItem::model()->updateByPk($item, array('sort'=>$position));  
    endforeach;
    echo "Playlist order updated";
	}
	    public function actionPlaylistTest()
	{
		$this->render('playlisttest');
	}
	
		public function actionOauthcallback() {
		     function get_oauth2_token($code) {
    global $client_id;
    global $client_secret;
    global $redirect_uri;
     
    $oauth2token_url = "https://accounts.google.com/o/oauth2/token";
    $clienttoken_post = array(
    "code" => $code,
    "client_id" => Yii::app()->params->yt_client_id,
    "client_secret" => Yii::app()->params->yt_client_secret,
    "redirect_uri" => "http://localhost:8888/dcadmin/site/oauthcallback",
    "grant_type" => "authorization_code"
    );
     
    $curl = curl_init($oauth2token_url);
 
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $clienttoken_post);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 
    $json_response = curl_exec($curl);
   
    curl_close($curl);
 
    $authObj = json_decode($json_response);
     
    if (isset($authObj->refresh_token)){
        //refresh token only granted on first authorization for offline access
        //save to db for future use (db saving not included in example)
        global $refreshToken;
        $refreshToken = $authObj->refresh_token;
    }
               
    $accessToken = $authObj->access_token;
    return $accessToken;
}
			if(isset($_REQUEST['code'])){
			$_SESSION['accessToken'] = get_oauth2_token($_REQUEST['code']);
			$this->redirect(Yii::app()->request->baseUrl);
			
			}
		}


}




		
	
