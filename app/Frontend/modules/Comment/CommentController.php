<?php
namespace app\Frontend\modules\Comment;
 
use \fram\BackController;
use \fram\HTTPRequest;
use \entity\Comments;
use \formBuilder\CommentFormBuilder;
use \fram\FormHandler;
 
class CommentController extends BackController
{
  public function executeInsertComment(HTTPRequest $request)
  {
    // Si le formulaire a été envoyé.
    if ($request->method() == 'POST')
    {

      $comment = new Comments([
        'billet' => $request->getData('billet'),
        'pseudo' => $request->postData('pseudo'),
        'contenu' => $request->postData('contenu')

      ]);
      
    }
    else
    {
      $comment = new Comments;
    }
 
    $formBuilder = new CommentFormBuilder($comment);
    $formBuilder->build();
 
    $form = $formBuilder->form();
 
    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Comments'), $request);
 
    if ($formHandler->process())
    {
      $this->app->users()->setFlash('<div class="alert alert-success" role="success">Le commentaire a bien été ajouté, merci !</div>');
 
      $this->app->httpResponse()->redirect('billet-'.$request->getData('billet').'.html');
    }
 
    $this->page->addVar('comments', $comment);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Ajout d\'un commentaire');
  
    }
    public function executeSignalerComment(HTTPRequest $request)
    {
      $manager = $this->managers->getManagerOf('Comments');
      $comment = $manager->get($request->getData('id'));

      $manager->signaler($comment);

      $this->app->users()->setFlash('<div class="alert alert-success" role="alert">Le commentaire a bien été signalé, merci !</div>');
      $this->app->httpResponse()->redirect('billet-'.$comment->billet().'.html');
    }


}