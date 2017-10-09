<?php
namespace model;

use \entity\User;
 
class UserManagerPDO extends UserManager
{


  public function getUser($pseudo)
  {
    $request = $this->dao->prepare('SELECT pseudo, passe FROM identifiants WHERE pseudo = :pseudo');
    
    $request->bindValue(':pseudo', $pseudo);
    $request->execute();

 
    $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\User');

    if ($user = $request->fetch())
    {
 
      return $user;
    }
    return null;
    
  }
    public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, pseudo, passe FROM identifiants';
 
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
 
    $request = $this->dao->query($sql);
    $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\User');
 
    $listeUser = $request->fetchAll();
 
    foreach ($listeUser as $user)
    {
      $user->setDateAjout(new \DateTime($user->dateAjout()));
      $user->setDateModif(new \DateTime($user->dateModif()));
    }
 
    $request->closeCursor();
 
    return $listeUser;
  }
  

 
  public function modify(User $user)
  {
    $request = $this->dao->prepare('UPDATE identifiants SET pseudo = :pseudo, passe = :passe WHERE id = :id');
 
    $request->bindValue(':pseudo', $user->pseudo());
    $request->bindValue(':passe', $user->passe());
    $request->bindValue(':id', $user->id(), \PDO::PARAM_INT);
 
    $request->execute();
  }
  public function addUser(User $user)
  {
    $request = $this->dao->prepare('INSERT INTO identifiants SET pseudo = :pseudo, passe = :passe');
    
    $request->bindValue(':pseudo', $user->pseudo());
    $request->bindValue(':passe', $user->passe());
    
    $request->execute();

  }
  public function save(User $user)
  {
    if ($user->isValid())
    {
      $user->isNew() ? $this->addUser($user) : $this->modify($user);
    }
    else
    {
      throw new \RuntimeException('le user doit être validée pour être enregistrée');
    }
  }
}