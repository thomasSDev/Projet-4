<?php
namespace model;
 
use \fram\Manager;
use \entity\Billet;
 
abstract class BilletManager extends Manager
{
  /**
   * Méthode permettant d'ajouter une billet.
   * @param $billet le billet à ajouter
   * @return void
   */
  abstract protected function add(Billet $billet);
 
  /**
   * Méthode permettant d'enregistrer une billet.
   * @param $billet billet le billet à enregistrer
   * @see self::add()
   * @see self::modify()
   * @return void
   */
  public function save(Billet $billet)
  {
    if ($billet->isValid())
    {
      $billet->isNew() ? $this->add($billet) : $this->modify($billet);
    }
    else
    {
      throw new \RuntimeException('le billet doit être validée pour être enregistrée');
    }
  }
 
  /**
   * Méthode renvoyant le nombre de billet total.
   * @return int
   */
  abstract public function count();
 
  /**
   * Méthode permettant de supprimer une billet.
   * @param $id int L'identifiant du billet à supprimer
   * @return void
   */
  abstract public function delete($id);
 
  /**
   * Méthode retournant une liste de billet demandée.
   * @param $debut int le première billet à sélectionner
   * @param $limite int Le nombre de billet à sélectionner
   * @return array le liste des billet. Chaque entrée est une instance de billet.
   */
  abstract public function getList($debut = -1, $limite = -1);
 
  /**
   * Méthode retournant une billet précise.
   * @param $id int L'identifiant du billet à récupérer
   * @return billet le billet demandée
   */
  abstract public function getUnique($id);
 
  /**
   * Méthode permettant de modifier une billet.
   * @param $billet le billet à modifier
   * @return void
   */
  abstract protected function modify(Billet $billet);
}