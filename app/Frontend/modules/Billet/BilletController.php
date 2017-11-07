<?php
namespace app\Frontend\modules\Billet;
 
use \fram\BackController;
use \fram\HTTPRequest;
use \entity\Billet;
use \entity\Comments;
use \formBuilder\CommentFormBuilder;
use \formBuilder\BilletFormBuilder;
use \fram\FormHandler;
 
class BilletController extends BackController
{
  public function executePreface(HTTPRequest $request)
  {
    $nombrePreface = $this->app->config()->get('nombre_preface');
   
 
    // On ajoute une définition pour le titre.
    $this->page->addVar('title', 'Liste des '.$nombrePreface.' dernières preface');
 
    // On récupère le manager des preface.
    $manager = $this->managers->getManagerOf('Preface');
 
    $listePreface = $manager->getList(0, 1);
 
    foreach ($listePreface as $preface)
    {

        $contenu = $preface->contenu();

 
        $preface->setcontenu($contenu);
      
    }
 
    // On ajoute la variable $listePreface à la vue.
    $this->page->addVar('listePreface', $listePreface);
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
    $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListOf($billet->id()));
  }
 


    public function executeBillet(HTTPRequest $request)
    {

    //Texte d'introduction
    $nombreIntro = $this->app->config()->get('nombre_intro');
   
 
    // On ajoute une définition pour le titre.
    $this->page->addVar('title', 'Liste des '.$nombreIntro.' dernières intro');
 
    // On récupère le manager des intro.
    $manager = $this->managers->getManagerOf('Intro');
 
    $listeIntro = $manager->getList(0, 1);
 
    foreach ($listeIntro as $intro)
    {

        $contenu = $intro->contenu();

 
        $intro->setcontenu($contenu);
      
    }
 
    // On ajoute la variable $listeIntro à la vue.
    $this->page->addVar('listeIntro', $listeIntro);

    //liste des Billet
    $nombreBillet = $this->app->config()->get('nombre_billet');
    $nombreCaracteres = $this->app->config()->get('nombre_caracteres');
 
    // On ajoute une définition pour le titre.
    $this->page->addVar('title', 'Liste des '.$nombreBillet.' dernières billet');
 
    // On récupère le manager des billet.
    $manager = $this->managers->getManagerOf('Billet');
 
    $listeBillet = $manager->getList(0, $nombreBillet);
 
    foreach ($listeBillet as $billet)
    {
      if (strlen($billet->contenu()) > $nombreCaracteres)
      {
        $debut = substr($billet->contenu(), 0, $nombreCaracteres);
        $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
 
        $billet->setcontenu($debut);
      }
    }
 
    // On ajoute la variable $listeBillet à la vue.
    $this->page->addVar('listeBillet', $listeBillet);

    //texte de description de l'auteur
    $nombreDescriptionAuteur = $this->app->config()->get('nombre_descriptionAuteur');
   
 
    // On ajoute une définition pour le titre.
    $this->page->addVar('title', 'Liste des '.$nombreDescriptionAuteur.' dernières descriptionAuteur');
 
    // On récupère le manager des descriptionAuteur.
    $manager = $this->managers->getManagerOf('DescriptionAuteur');
 
    $listeDescriptionAuteur = $manager->getList(0, 1);
 
    foreach ($listeDescriptionAuteur as $descriptionAuteur)
    {

        $contenu = $descriptionAuteur->contenu();

 
        $descriptionAuteur->setcontenu($contenu);
      
    }
 
    // On ajoute la variable $listeDescriptionAuteur à la vue.
    $this->page->addVar('listeDescriptionAuteur', $listeDescriptionAuteur);


  }

}