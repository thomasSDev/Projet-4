<?php
namespace model;

use \entity\User;
 
class UserManagerPDO extends UserManager
{


  public function getUser($mail)
  {
    $request = $this->dao->prepare('SELECT mail, pseudo, passe FROM identifiants WHERE mail = :mail');
    
    $request->bindValue(':mail', $mail);
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
    $sql = 'SELECT id, mail, pseudo, passe FROM identifiants';
 
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
 
    $request = $this->dao->query($sql);
    $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\User');
 
    $listeUsers = $request->fetchAll();
 
    foreach ($listeUsers as $user)
    {
      $user;
    }
 
    $request->closeCursor();
 
    return $listeUsers;
  }
  
  public function count()
  {
    return $this->dao->query('SELECT COUNT(*) FROM identifiants')->fetchColumn();
  }
 
  public function modify(User $user)
  {
    $request = $this->dao->prepare('UPDATE identifiants SET mail = :mail, pseudo = :pseudo, passe = :passe WHERE id = :id');
 
    $request->bindValue(':mail', $user->mail());
    $request->bindValue(':pseudo', $user->pseudo());
    $request->bindValue(':passe', $user->passe());
    $request->bindValue(':id', $user->id(), \PDO::PARAM_INT);
 
    $request->execute();
  }
  public function addUser(User $user)
  {
    $request = $this->dao->prepare('INSERT INTO identifiants SET mail = :mail, pseudo = :pseudo, passe = :passe');
    
    $request->bindValue(':mail', $user->mail());
    $request->bindValue(':pseudo', $user->pseudo());
    $request->bindValue(':passe', $user->passe());
    
    $request->execute();

  }
  
  public function getUnique($id)
  {
    $request = $this->dao->prepare('SELECT id, mail, pseudo, passe FROM identifiants WHERE id = :id');
    $request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $request->execute();
 
    $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\User');
 
    if ($user = $request->fetch())
    {
      $user;
 
      return $user;
    }
 
    return null;
  }
    public function getMail($mail)
  {
    $request = $this->dao->prepare('SELECT id, mail, pseudo, passe FROM identifiants WHERE mail = :mail');

    $request->bindValue(':mail', (string) $mail, \PDO::PARAM_STR);
    $request->execute();
 
    $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\User');
 
    if ($user = $request->fetch())
    {
      $user;
 
      return $user;
    }
 
    return null;
  }
  public function deleteUser($id)
  {
    $this->dao->exec('DELETE FROM identifiants WHERE id = '.(int) $id);
  }
 
 
}