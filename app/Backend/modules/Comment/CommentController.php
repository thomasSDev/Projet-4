<?php
namespace app\Backend\modules\Comment;
 
use \fram\BackController;
use \fram\HTTPRequest;
use \entity\Comments;
use \formBuilder\CommentFormBuilder;
use \fram\FormHandler;

class CommentController extends BackController
{
  public function executeDeleteComment(HTTPRequest $request)
  {
    $this->managers->getManagerOf('Comments')->deleteComment($request->getData('id'));
  
    $this->app->users()->setFlash('<div class="alert alert-danger" role="alert">Le commentaire a bien été supprimé !</div>');
 
    $this->app->httpResponse()->redirect('/admin/commentaires-signales.html');
  }
  
  public function executeCommentsSignales(HTTPRequest $request)
  {
    //commentaires signalés
    $this->page->addVar('title', 'Modération des commentaires');
 
    $manager = $this->managers->getManagerOf('Comments');
 
    $this->page->addVar('listeCommentairesSignales', $manager->getCommentSignale());

  }
  public function executeUpdateComment(HTTPRequest $request)
  {
    $this->processForm($request);
 
    $this->page->addVar('title', 'Modification d\'un commentaire');
  }
  public function executeStopSignalerComment(HTTPRequest $request)
  {
      $manager = $this->managers->getManagerOf('Comments');
      $comment = $manager->get($request->getData('id'));

      $manager->stopSignaler($comment);

      $this->app->users()->setFlash('<div class="alert alert-success" role="alert">Le commentaire a bien été retiré des commentaires signalés !</div>');
      $this->app->httpResponse()->redirect('/admin/commentaires-signales.html');
  }
  
  public function processForm(HTTPRequest $request)
  {
    if ($request->method() == 'POST')
    {
      $comment = new Comments([
        'pseudo' => $request->postData('pseudo'),
        'titre' => $request->postData('titre'),
        'contenu' => $request->postData('contenu')
      ]);
 
      if ($request->getExists('id'))
      {
        $comment->setId($request->getData('id'));
      }
    }
    else
    {
      // L'identifiant du commentaire est transmis si on veut le modifier
      if ($request->getExists('id'))
      {
        $comment = $this->managers->getManagerOf('Comments')->getUnique($request->getData('id'));
      }
      else
      {
        $comment = new Comments;
      }
    }
  
    $formBuilder = new CommentFormBuilder($comment);
    $formBuilder->build();
  
    $form = $formBuilder->form();
 
    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Comments'), $request);
 
    if ($formHandler->process())
    {
      $this->app->users()->setFlash('<div class="alert alert-success" role="alert">Le commentaire a bien été modifié, vous pouvez le retirer de la liste.</div>');
      
      $this->app->httpResponse()->redirect('/admin/commentaires-signales.html');
    }
 
    $this->page->addVar('form', $form->createView());
  }
}
