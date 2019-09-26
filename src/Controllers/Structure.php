<?php

namespace src\Controllers;

use src\Models\ModelManager;

class Structure extends ModelManager
{
  /**
   * const Dataabse table value
   */
  const CLASS_NAME = 'structure';

  private $_idStructure;
  private $_nom;
  private $_rue;
  private $_codePostal;
  private $_ville;
  private $_statut;
  private $_actionnaire;
  private $_donateur;

  function __contstruct($idStructure, $nom, $rue, $codePostal, $ville, $statut, $actionnaire, $donateur)
  {
    $this->_idStructure = $idStructure;
    $this->_nom = $nom;
    $this->_rue = $rue;
    $this->_codePostal = $codePostal;
    $this->_ville = $ville;
    $this->_statut = $statut;
    $this->_actionnaire = $actionnaire;
    $this->_donateur = $donateur;
  }
  
  public function index(int $id)
  {
    IModelManager::index(CLASS_NAME, $id);
  }
  public function fetchAll()
  {
    IModelManager::fetchAll(CLASS_NAME);
  }

  public function create()
  { }

  /**
   * Get the value of _idStructure
   */
  public function getIdStructure()
  {
    return $this->_idStructure;
  }


  /**
   * Get the value of _nom
   */
  public function getNom()
  {
    return $this->_nom;
  }

  /**
   * Set the value of _nom
   *
   */
  public function setNom($_nom)
  {
    $this->_nom = $_nom;
  }

  /**
   * Get the value of _rue
   */
  public function getRue()
  {
    return $this->_rue;
  }

  /**
   * Set the value of _rue
   *
   */
  public function setRue($_rue)
  {
    $this->_rue = $_rue;
  }

  /**
   * Get the value of _codePostal
   */
  public function getCodePostal()
  {
    return $this->_codePostal;
  }

  /**
   * Set the value of _codePostal
   */
  public function setCodePostal($_codePostal)
  {
    $this->_codePostal = $_codePostal;
  }

  /**
   * Get the value of _ville
   */
  public function getVille()
  {
    return $this->_ville;
  }

  /**
   * Set the value of _ville
   */
  public function setVille($_ville)
  {
    $this->_ville = $_ville;
  }

  /**
   * Get the value of _statut
   */
  public function getStatut()
  {
    return $this->_statut;
  }

  /**
   * Set the value of _statut
   *
   */
  public function setStatut($_statut)
  {
    $this->_statut = $_statut;
  }

  /**
   * Get the value of _actionnaire
   */
  public function getActionnaire()
  {
    return $this->_actionnaire;
  }

  /**
   * Set the value of _actionnaire
   */
  public function setActionnaire($_actionnaire)
  {
    $this->_actionnaire = $_actionnaire;
  }

  /**
   * Get the value of _donateur
   */
  public function getDonateur()
  {
    return $this->_donateur;
  }

  /**
   * Set the value of _donateur
   */
  public function setDonateur($_donateur)
  {
    $this->_donateur = $_donateur;
  }


}
