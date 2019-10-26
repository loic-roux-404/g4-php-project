<?php

namespace SRC\Models;

//use src\Models\IModelManager;
use PDO;
use PDOException;
use SRC\Helpers\Globals;
/**
 * Mini ORM class
 */
abstract class ModelManager
{

    protected const PW = "IL3tuUFSCQ";
    protected const USR = "mVrrTxQ5nS";

    /**
     * Table name 
     * @var [string]
     */
    protected $_tn;
    private $_globals;
    private $_model;

    public function __construct(array $_model)
    {
        //var_dump(static);
        $this->_tn = static::TABLE_NAME;
        $this->_globals = new Globals;
        array_pop($_model);
        $this->_model = $_model;
    }

    /**
     * function Connect BDD
     * @return PDO $conn
     */
    protected static function connect(): PDO
    {
        try {
            //new \PDO("mysql:host=" . self::SV, self::USR, self::PW);
            $conn = new PDO("mysql:host=remotemysql.com;dbname=mVrrTxQ5nS", self::USR, self::PW);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (Exception $e) {
            return 'Echec Connection <hr>' . $e->getMessage();
        }
    }


    /**
     * function fetch
     * @param int $id (optional)
     * @param string $row (optional)
     * @return void
     */

    public function fetch(int $id = null): array
    {
        if ($id) {
            $stmt = self::connect()->prepare("select * from " . $this->_tn . " where id=" . $id);
        } else {
            $stmt = self::connect()->prepare("select * from " . $this->_tn);
        }
        //var_dump($stmt);
        //var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));

        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->_globals->setAlert('error', 'danger', $this->_tn,  $e->getCode() . 'Impossible de récupérer les données' . $e->getMessage());
        }
    }
    /**
     * function fetchRows
     * @param int $id (optional)
     * @param array $rows
     * @return void
     */

    public function fetchRow(string $row, int $id = null): array
    {
        if ($id) {
            $stmt = self::connect()->prepare("select ${row} from {$this->_tn} where id= ${id}");
        } else {
            $stmt = self::connect()->prepare("select ${row} from {$this->_tn}");
        }
        //var_dump($stmt);
        //var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));

        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->_globals->setAlert('error', 'danger', $this->_tn,  $e->getCode() . 'Impossible de récupérer la colonne <hr>' . $e->getMessage());
        }
    }

    /**
     * function customQuery
     * @param string $query (optional)
     * @param bool $select
     * @return void
     */
    public function customQuery(string $query, bool $select)
    {
        $stmt = self::connect()->prepare($query);

        try {
            if ($select) {
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $stmt->execute();
            }
        } catch (PDOException $e) {
            $this->_globals->setAlert('error', 'danger', $this->_tn,  'Erreur de requète personnalisée <hr> ' . $e->getMessage());
        }
    }

    /**
     * function update
     * @param array $data
     * @param int $toUpdateId
     * @return void
     */

    public function update(array $data, int $toUpdateId): void
    {
        $update = "";
        $i = 0;
        $fullQueriesArray = [":id" => $toUpdateId];
        foreach ($data as $cellName => $value) {
            $i++;
            //var_dump($cellName);
            $update .=  count($data) === $i ? $cellName . '=:' . $cellName : $cellName . '=:' . $cellName . ', ';
            $fullQueriesArray[":" . $cellName] = $value;
        }
        $stmt = self::connect()->prepare("UPDATE " . $this->_tn . " SET " . $update . " WHERE id=:id");
        try {
            $stmt->execute($fullQueriesArray);
            $this->_globals->setAlert('update', 'success', $this->_tn,  reset($data));
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                $this->_globals->setAlert('error', 'danger', $this->_tn,  'Cet enregistrement existe');
            } else {
                $this->_globals->setAlert('error', 'danger', $this->_tn,  'echec de la mise à jour<br>' . $e->getMessage());
            }
        }
    }

    /**
     * function create
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        //var_dump($data);
        $comma = "";
        $dots = "";
        $i = 0;
        $fullQueriesArray = [":id" => NULL];
        foreach ($data as $cellName => $value) {
            $i++;
            $comma .= count($data) === $i ? $cellName : $cellName . ', ';
            $dots .=  count($data) === $i ? ':' . $cellName : ':' . $cellName . ', ';
            $fullQueriesArray[":" . $cellName] = $value;
        }
        $db = self::connect();
        $stmt =  $db->prepare("insert into " . $this->_tn . "( id, " . $comma . ") values ( :id, " . $dots . ")");

        try {
            $stmt->execute($fullQueriesArray);

            $this->_globals->setAlert('create', 'success', $this->_tn, reset($data) . " ajouté");
            return (int) $db->lastInsertId();
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                $this->_globals->setAlert('error', 'danger', $this->_tn, 'Cet enregistrement existe');
            } else {
                $this->_globals->setAlert('error', 'danger', $this->_tn, 'echec de l\'ajout<br>' . $e->getMessage());
            }
        }
    }

    /**
     * function delete
     * @param string $_tn
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        try {
            $stmt = self::connect()->prepare("DELETE FROM " . $this->_tn . " WHERE id =" . $id);
            $stmt->execute();
            $this->_globals->setAlert('delete', 'success', $this->_tn, $id);
        } catch (PDOException $e) {
            //var_dump($e);
            if ($e->errorInfo[1] == 1217) {
                $this->_globals->setAlert('error', 'danger', $this->_tn, ' Retirer d\'abord l\'enregistrement associé');
            } else {
                $this->_globals->setAlert('error', 'danger', $this->_tn, ' Echec de la suppression');
            }
        }
    }

    /**
     * Get Model array
     * @return $_model
     */
    public function getModel()
    {
        return $this->_model;
    }

    /**
     * Generates the magic method
     */
    public function __toString()
    {
        return $this->_tn . ' modelmanager';
    }
}
