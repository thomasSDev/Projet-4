<?php
namespace app\Backend\modules\DescriptionAuteur;
 
use \fram\BackController;
use \fram\HTTPRequest;
use \entity\DescriptionAuteur;
use \formBuilder\DescriptionAuteurFormBuilder;
use \fram\FormHandler;
 
class DescriptionAuteurController extends BackController
{

  public function executeUpdateDescriptionAuteur(HTTPRequest $request)
  {
    $this->processForm($request);
 
    $this->page->addVar('title', 'Modification');
  }

  public function processForm(HTTPRequest $request)
  {
    if ($request->method() == 'POST')
    {
      $descriptionAuteur = new DescriptionAuteur([
        'auteur' => $request->postData('auteur'),
        'titre' => $request->postData('titre'),
        'contenu' => $request->postData('contenu')
      ]);
 
      if ($request->getExists('id'))
      {
        $descriptionAuteur->setId($request->getData('id'));
      }
    }
    else
    {
      // L'identifiant de la descriptionAuteur est transmis si on veut le modifier
      if ($request->getExists('id'))
      {
        $descriptionAuteur = $this->managers->getManagerOf('DescriptionAuteur')->getUnique($request->getData('id'));
      }
      else
      {
        $descriptionAuteur = new DescriptionAuteur;
      }
    }
  
    $formBuilder = new DescriptionAuteurFormBuilder($descriptionAuteur);
    $formBuilder->build();
  
    $form = $formBuilder->form();
 
    $formHandler = new FormHandler($form, $this->managers->getManagerOf('DescriptionAuteur'), $request);
 
    if ($formHandler->process())
    {
      $this->app->users()->setFlash($descriptionAuteur->isNew() ? '<div class="alert alert-success" role="alert">La description de l\'auteur a bien été ajoutée !</div>' : '<div class="alert alert-success" role="alert">La description de l\'auteur a bien été modifiée !</div>');
 
      $this->app->httpResponse()->redirect('/billet.html');
    }
 
    $this->page->addVar('form', $form->createView());
  }


}
