<?php
namespace app\Backend\modules\Preface;
 
use \fram\BackController;
use \fram\HTTPRequest;
use \entity\Preface;
use \formBuilder\PrefaceFormBuilder;
use \fram\FormHandler;
 
class PrefaceController extends BackController
{
  public function executeUpdatePreface(HTTPRequest $request)
  {
    $this->processForm($request);
 
    $this->page->addVar('title', 'Modification');
  }

  public function processForm(HTTPRequest $request)
  {
    if ($request->method() == 'POST')
    {
      $preface = new Preface([
        'auteur' => $request->postData('auteur'),
        'titre' => $request->postData('titre'),
        'contenu' => $request->postData('contenu')
      ]);
 
      if ($request->getExists('id'))
      {
        $preface->setId($request->getData('id'));
      }
    }
    else
    {
      // L'identifiant de la preface est transmis si on veut le modifier
      if ($request->getExists('id'))
      {
        $preface = $this->managers->getManagerOf('Preface')->getUnique($request->getData('id'));
      }
      else
      {
        $preface = new Preface;
      }
    }
  
    $formBuilder = new PrefaceFormBuilder($preface);
    $formBuilder->build();
  
    $form = $formBuilder->form();
 
    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Preface'), $request);
 
    if ($formHandler->process())
    {
      $this->app->users()->setFlash($preface->isNew() ? '<div class="alert alert-success" role="alert">La préface a bien été ajoutée !</div>' : '<div class="alert alert-success" role="alert">La préface a bien été modifiée !</div>');
 
      $this->app->httpResponse()->redirect('/');
    }
 
    $this->page->addVar('form', $form->createView());
  }
}
