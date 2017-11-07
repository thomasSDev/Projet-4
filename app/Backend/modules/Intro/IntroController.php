<?php
namespace app\Backend\modules\Intro;
 
use \fram\BackController;
use \fram\HTTPRequest;
use \entity\Intro;
use \formBuilder\IntroFormBuilder;
use \fram\FormHandler;
 
class IntroController extends BackController
{

  public function executeUpdateIntro(HTTPRequest $request)
  {
    $this->processForm($request);
 
    $this->page->addVar('title', 'Modification');
  }

  public function processForm(HTTPRequest $request)
  {
    if ($request->method() == 'POST')
    {
      $intro = new Intro([
        'auteur' => $request->postData('auteur'),
        'titre' => $request->postData('titre'),
        'contenu' => $request->postData('contenu')
      ]);
 
      if ($request->getExists('id'))
      {
        $intro->setId($request->getData('id'));
      }
    }
    else
    {
      // L'identifiant du texte d'introduction est transmis si on veut le modifier
      if ($request->getExists('id'))
      {
        $intro = $this->managers->getManagerOf('Intro')->getUnique($request->getData('id'));
      }
      else
      {
        $intro = new Intro;
      }
    }
  
    $formBuilder = new IntroFormBuilder($intro);
    $formBuilder->build();
  
    $form = $formBuilder->form();
 
    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Intro'), $request);
 
    if ($formHandler->process())
    {
      $this->app->users()->setFlash($intro->isNew() ? '<div class="alert alert-success" role="alert">Le texte d\'introduction a bien été ajoutée !</div>' : '<div class="alert alert-success" role="alert">Le texte d\'introduction a bien été modifiée !</div>');
 
      $this->app->httpResponse()->redirect('/billet.html');
    }
 
    $this->page->addVar('form', $form->createView());
  }


}
