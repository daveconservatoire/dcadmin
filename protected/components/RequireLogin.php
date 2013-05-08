<?php
class RequireLogin extends CBehavior
{

public function attach($owner)
{
    $owner->attachEventHandler('onBeginRequest', array($this, 'handleBeginRequest'));
}

public function handleBeginRequest($event)
{
$app = Yii::app();
$user = $app->user;

$request = trim($app->urlManager->parseUrl($app->request), '/');
$login = trim($user->loginUrl[0], '/');

// Restrict guests to public pages.
$allowed = array($login);
if ($user->isGuest && !in_array($request, $allowed))
$user->loginRequired();

// Prevent logged in users from viewing the login page.
$request = substr($request, 0, strlen($login));
if (!$user->isGuest && $request == $login)
{
$url = $app->createUrl($app->homeUrl[0]);
$app->request->redirect($url);
}
}
}
?>