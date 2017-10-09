<?php
namespace app\backend\modules\connexion;
 
use \fram\BackController;
use \fram\HTTPRequest;
use \entity\User;
use \model\UserManager;
use \model\UserManagerPDO;
 
class ConnexionController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Connexion');
 

   
    if (($request->postExists('pseudo')) && ($request->postExists('password')))
    {
      $manager = $this->managers->getManagerOf('User');

      $user = $manager->getUser($request->postData('pseudo'));


      $login = $request->postData('pseudo');
      $password = sha1($request->postData('password'));
   

      if ($login == $user->pseudo() && ($password == $user->passe()))
      {

        $this->app->user()->setAuthenticated(true);
        $this->app->httpResponse()->redirect('.');
      }
      else
      {
        $this->app->user()->setFlash('Le pseudo ou le mot de passe est incorrect.');
      }
    }
  }
}