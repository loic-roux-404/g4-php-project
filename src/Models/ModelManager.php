<?php

namespace src\Models;

//use src\Models\IModelManager;
use PDO;

abstract class ModelManager
{
    const HOST = "remotemysql.com";
    const USR = "mVrrTxQ5nS";
    const PW = "IL3tuUFSCQ";
    const DB_NAME = "mVrrTxQ5nS";

    private $_cells;

    public function __construct(array $_cells)
    {
        var_dump($_cells);
        $this->_cells = $_cells;
    }

    static function connect()
    {
        try {
            //new \PDO("mysql:host=" . self::SV, self::USR, self::PW);
            $conn = new PDO("mysql:host=remotemysql.com;dbname=mVrrTxQ5nS", self::USR, self::PW);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (Exception $e) {
            return 'Connection failed ' . $e;
        }
    }
    /**
     * function index
     * @param string $en
     * @return array $lines
     */
    public function fetchAll(string $en)
    {
        //var_dump(self::connect());
        $stmt = self::connect()->prepare("select * from " . $en);

        $res = $stmt->execute();
        //var_dump($res);

        if ($res) {
            $lines = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            //var_dump($lines);
        }

        return $lines;
    }
    /**
     * function update
     * @param string $en
     * @param array $data
     * @return void
     */

    public function update(string $en, array $data, int $toUpdateId)
    {
        $this->create($en, $data, $toUpdateId);
    }

    /**
     * function create
     * @param string $en
     * @param array $data
     * @param int $toUpdateId
     * @return void
     */
    public function create(string $en, array $data, int $toUpdateId = null): void
    {

        $comma = "";
        $dots = "";
        $i = 0;
        $fullQueriesArray = [":id" => $toUpdateId ? $toUpdateId : NULL];
        var_dump($fullQueriesArray);
        foreach ($data as $cellName => $value) {
            var_dump($i);
            $i++;

            $comma .= count($data) === $i ? $cellName : $cellName . ', ';
            $dots .=  count($data) === $i ? ':' . $cellName : ':' . $cellName . ', ';

            $fullQueriesArray[":" . $cellName] = $value;
        }
        $stmt = self::connect()->prepare("insert into " . $en . "( id, " . $comma . ") values ( :id, " . $dots . ")");
        var_dump($stmt);
        $stmt->execute($fullQueriesArray);
    }

    /**
     * function create
     * @param string $en
     * @param array $data
     * @return void
     */

    public function index(string $en, number $id)
    {
        $stmt = self::connect()->prepare("select * from structure");

        $res = $stmt->execute();
        var_dump($res);

        if ($res) {
            $lines = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            var_dump($lines);
        }

        return $stmt->execute();
    }

    /**
     * function delete
     *
     * @param string $en
     * @param integer $id
     * @return void
     */
    public function delete(string $en, int $id): void
    { }

    /**
     * Set the value of _cells
     *
     * @param string $_cells
     */
    public function setCells(array $_cells)
    {
        $this->_cells = $_cells;
    }
}
