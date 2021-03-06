<?php
namespace model;
 
use \entity\Comments;
 
class CommentsManagerPDO extends CommentsManager
{
  protected function add(Comments $comment)
  {
    $q = $this->dao->prepare('INSERT INTO commentaires SET billets_id = :billet, pseudo = :pseudo, contenu = :contenu, dateAjout = NOW()');
 
    $q->bindValue(':billet', $comment->billet(), \PDO::PARAM_INT);
    $q->bindValue(':pseudo', $comment->pseudo());
    $q->bindValue(':contenu', $comment->contenu());
 
    $q->execute();
 
    $comment->setId($this->dao->lastInsertId());
  }
 
  public function deleteComment($id)
  {
    $this->dao->exec('DELETE FROM commentaires WHERE id ='.(int) $id);
  }
 
  public function deleteFromBillet($billet)
  {
    $this->dao->exec('DELETE FROM commentaires WHERE billets_id ='.(int) $billet);
  }
 
  public function getListOf($billet)
  {
    if (!ctype_digit($billet))
    {
      throw new \InvalidArgumentException('L\'identifiant du billet passé doit être un nombre entier valide');
    }
 
    $q = $this->dao->prepare('SELECT id, billets_id, pseudo, contenu, dateAjout FROM commentaires WHERE billets_id = :billets_id');
    $q->bindValue(':billets_id', $billet, \PDO::PARAM_INT);
    $q->execute();
 
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\Comments');
 
    $comments = $q->fetchAll();
 
    foreach ($comments as $comment)
    {
      $comment->setDateAjout(new \DateTime($comment->dateAjout()));
    }
 
    return $comments;
  }
 
  protected function modify(Comments $comment)
  {
    $q = $this->dao->prepare('UPDATE commentaires SET pseudo = :pseudo, contenu = :contenu WHERE id = :id');
 
    $q->bindValue(':pseudo', $comment->pseudo());
    $q->bindValue(':contenu', $comment->contenu());
    $q->bindValue(':id', $comment->id(), \PDO::PARAM_INT);
 
    $q->execute();
  }
 
  public function get($id)
  {
    $q = $this->dao->prepare('SELECT id, pseudo, contenu, billets_id, dateAjout FROM commentaires WHERE id = :id');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();
 
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\Comments');
 
    return $q->fetch();
  }
    public function getUnique($id)
  {
    $requete = $this->dao->prepare('SELECT id, pseudo, titre, contenu, dateAjout FROM commentaires WHERE id = :id');
    $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $requete->execute();
 
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\Comments');
 
    if ($comment = $requete->fetch())
    {
      $comment->setDateAjout(new \DateTime($comment->dateAjout()));
 
      return $comment;
    }
 
    return null;
  }
 
  public function signaler(Comments $comment)
  {
    $q = $this->dao->prepare('UPDATE commentaires SET signale = 1 WHERE id = :id');
 
    $q->bindValue(':id', $comment->id(), \PDO::PARAM_INT);
 
    $q->execute();
  }
  public function stopSignaler(Comments $comment)
  {
    $q = $this->dao->prepare('UPDATE commentaires SET signale = 0 WHERE id = :id');
 
    $q->bindValue(':id', $comment->id(), \PDO::PARAM_INT);
 
    $q->execute();
  }
  public function getCommentSignale($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, pseudo, contenu, billets_id, dateAjout FROM commentaires WHERE signale = 1';
 
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
 
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\Comments');
 
    $listeCommentairesSignales = $requete->fetchAll();
 
    foreach ($listeCommentairesSignales as $comment)
    {
      $comment->setDateAjout(new \DateTime($comment->dateAjout()));

    }
 
    $requete->closeCursor();
 
    return $listeCommentairesSignales;
  }
 
 
}