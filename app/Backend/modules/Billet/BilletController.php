<?php
namespace app\Backend\modules\Billet;
 
use \fram\BackController;
use \fram\HTTPRequest;
use \entity\Billet;
use \entity\Comments;
use \formBuilder\CommentFormBuilder;
use \formBuilder\BilletFormBuilder;
use \fram\FormHandler;
 
class BilletController extends BackController
{
  public function executeDelete(HTTPRequest $request)
  {
    $billetId = $request->getData('id');
 
    $this->managers->getManagerOf('Billet')->delete($billetId);
    $this->managers->getManagerOf('Comments')->deleteFromBillet($billetId);
 
    $this->app->users()->setFlash('<div class="alert alert-danger" role="alert">le billet a bien été supprimée !</div>');
 
    $this->app->httpResponse()->redirect('.');
  }
 
  public function executeIndex(HTTPRequest $request)
  {
    //liste des billet
    $this->page->addVar('title', 'Gestion des billet');
 
    $manager = $this->managers->getManagerOf('Billet');
 
    $this->page->addVar('listeBillet', $manager->getList());
    $this->page->addVar('nombreBillet', $manager->count());

  }
  public function executeShow(HTTPRequest $request)
  {
    $billet = $this->managers->getManagerOf('Billet')->getUnique($request->getData('id'));
 
    if (empty($billet))
    {
      $this->app->httpResponse()->redirect404();
    }
    $this->page->addVar('titre', $billet->titre());
    $this->page->addVar('billet', $billet);
  }

  public function executeInsert(HTTPRequest $request)
  {
    $this->processForm($request);
 
    $this->page->addVar('title', 'Ajout d\'un billet');
  }

  
  public function executeUpdate(HTTPRequest $request)
  {
    $this->processForm($request);
 
    $this->page->addVar('title', 'Modification d\'un billet');
  }

  public function processForm(HTTPRequest $request)
  {
    if ($request->method() == 'POST')
    {
      $billet = new Billet([
        'auteur' => $request->postData('auteur'),
        'titre' => $request->postData('titre'),
        'contenu' => $request->postData('contenu')
      ]);
 
      if ($request->getExists('id'))
      {
        $billet->setId($request->getData('id'));
      }
    }
    else
    {
      // L'identifiant du billet est transmis si on veut le modifier
      if ($request->getExists('id'))
      {
        $billet = $this->managers->getManagerOf('Billet')->getUnique($request->getData('id'));
      }
      else
      {
        $billet = new Billet;
      }
    }
  
    $formBuilder = new BilletFormBuilder($billet);
    $formBuilder->build();
  
    $form = $formBuilder->form();
 
    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Billet'), $request);
 
    if ($formHandler->process())
    {
      $this->app->users()->setFlash($billet->isNew() ? '<div class="alert alert-success" role="alert">Le Billet a bien été ajoutée !</div>' : '<div class="alert alert-success" role="alert">Le Billet a bien été modifiée !</div>');
 
      $this->app->httpResponse()->redirect('/admin/');
    }
 
    $this->page->addVar('form', $form->createView());
  }
}
