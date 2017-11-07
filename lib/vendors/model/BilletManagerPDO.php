<?php
namespace model;
 
use \entity\Billet;
 
class BilletManagerPDO extends BilletManager
{
  protected function add(Billet $billet)
  {
    $requete = $this->dao->prepare('INSERT INTO billets SET auteur = :auteur, titre = :titre, contenu = :contenu, dateAjout = NOW(), dateModif = NOW()');
 
    $requete->bindValue(':titre', $billet->titre());
    $requete->bindValue(':auteur', $billet->auteur());
    $requete->bindValue(':contenu', $billet->contenu());
 
    $requete->execute();
  }
 
  public function count()
  {
    return $this->dao->query('SELECT COUNT(*) FROM billets')->fetchColumn();
  }
 
  public function delete($id)
  {
    $this->dao->exec('DELETE FROM billets WHERE id = '.(int) $id);
  }
 
  public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, auteur, titre, contenu, dateAjout, dateModif FROM billets ORDER BY id DESC';
 
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
 
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\Billet');
 
    $listeBillet = $requete->fetchAll();
 
    foreach ($listeBillet as $billet)
    {
      $billet->setDateAjout(new \DateTime($billet->dateAjout()));
      $billet->setDateModif(new \DateTime($billet->dateModif()));
    }
 
    $requete->closeCursor();
 
    return $listeBillet;
  }
 
  public function getUnique($id)
  {
    $requete = $this->dao->prepare('SELECT id, auteur, titre, contenu, dateAjout, dateModif FROM billets WHERE id = :id');
    $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $requete->execute();
 
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\entity\Billet');
 
    if ($billet = $requete->fetch())
    {
      $billet->setDateAjout(new \DateTime($billet->dateAjout()));
      $billet->setDateModif(new \DateTime($billet->dateModif()));
 
      return $billet;
    }
 
    return null;
  }
 
  protected function modify(Billet $billet)
  {
    $requete = $this->dao->prepare('UPDATE billets SET auteur = :auteur, titre = :titre, contenu = :contenu, dateModif = NOW() WHERE id = :id');
 
    $requete->bindValue(':titre', $billet->titre());
    $requete->bindValue(':auteur', $billet->auteur());
    $requete->bindValue(':contenu', $billet->contenu());
    $requete->bindValue(':id', $billet->id(), \PDO::PARAM_INT);
 
    $requete->execute();
  }
}