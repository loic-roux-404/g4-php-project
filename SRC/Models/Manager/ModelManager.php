<?php

namespace SRC\Models\Manager;

class ModelManager implements IModelManager
{
    const SV = "remotemysql.com";
    const USR = "mVrrTxQ5nS";
    const PW = "IL3tuUFSCQ";
    const DB = "mVrrTxQ5nS";

    private $_cells;

    public function __construct($_cells)
    {
        $this->_cells = $_cells;
    }

    public function connect()
    {
        try {
            new PDO("mysql:host=$this::SV", $this::USR, $this::PW);
        } catch (Exception $e) {
            return 'Connection failed ' . $e;
        }
    }
    /**
     * function index
     * @param string $en
     * @param array $data
     * @return void
     */
    public function index(string $en, int $id)
    { }
    /**
     * function update
     * @param string $en
     * @param array $data
     * @return void
     */

    public function update(string $en, int $id, array $data)
    { }

    /**
     * function create
     * @param string $en
     * @param array $data
     * @return void
     */
    public function create(string $en, array $data): void
    { }
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
