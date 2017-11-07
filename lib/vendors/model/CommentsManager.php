<?php
namespace model;
 
use \fram\Manager;
use \entity\Comments;
 
abstract class CommentsManager extends Manager
{
  /**
   * Méthode permettant d'ajouter un commentaire.
   * @param $comment Le commentaire à ajouter
   * @return void
   */
  abstract protected function add(Comments $comment);
 
  /**
   * Méthode permettant de supprimer un commentaire.
   * @param $id L'identifiant du commentaire à supprimer
   * @return void
   */
  abstract public function DeleteComment($id);
 
  /**
   * Méthode permettant de supprimer tous les commentaires liés à un billet
   * @param $billet L'identifiant de le billet dont les commentaires doivent être supprimés
   * @return void
   */
  abstract public function deleteFromBillet($billet);
 
  /**
   * Méthode permettant d'enregistrer un commentaire.
   * @param $comment Le commentaire à enregistrer
   * @return void
   */
  public function save(Comments $comment)
  {
    if ($comment->isValid())
    {
      $comment->isNew() ? $this->add($comment) : $this->modify($comment);
    }
    else
    {
      throw new \RuntimeException('Le commentaire doit être validé pour être enregistré');
    }
  }
 
  /**
   * Méthode permettant de récupérer une liste de commentaires.
   * @param $billet le billet sur laquelle on veut récupérer les commentaires
   * @return array
   */
  abstract public function getListOf($billet);
 
  /**
   * Méthode permettant de modifier un commentaire.
   * @param $comment Le commentaire à modifier
   * @return void
   */
  abstract protected function modify(Comments $comment);
 
  /**
   * Méthode permettant d'obtenir un commentaire spécifique.
   * @param $id L'identifiant du commentaire
   * @return Comments
   */
  abstract public function get($id);
   /**
   * Méthode permettant d'obtenir un commentaire spécifique.
   * @param $id L'identifiant du commentaire
   * @return Comments
   */
  abstract public function getUnique($id);
  /**
   * Méthode permettant de signaler un commentaire.
   * @param $comment le commentaire à signaler
   * @return Comments
   */
  abstract public function signaler(Comments $comment);


  abstract public function stopSignaler(Comments $comment);
    /**
   * Méthode permettant d'obtenir la liste des commentaires signalés.
   * @param $debut int le premièr commentaire à sélectionner
   * @param $limite int Le nombre de commentaires à sélectionner
   * @return array la liste des commentaires. Chaque entrée est une instance de comments.
   */
  abstract public function getCommentSignale($debut = -1, $limite = -1);

}