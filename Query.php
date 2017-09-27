<?php

/**
 * Думаю итак опнятно по названиям методов кто че делает
 *
 * Class Query
 */
class Query
{
    protected $connection = null;

    protected $query = '';

    protected $executeResult;

    private $config = [
        'host' => '127.0.0.1',
        'db' => 'test_blog',
        'user' => 'root',
        'pass' => '',
        'charset' => 'utf8',
    ];

    function __construct()
    {
        $connectionConfig = $this->config;
        $dsn = 'mysql:host=' . $connectionConfig['host']
            . ';dbname=' . $connectionConfig['db']
            . ';charset=' . $connectionConfig['charset'] . ';';
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $this->connection = new PDO($dsn, $connectionConfig['user'], $connectionConfig['pass'], $opt);
    }

    /**
     * @param string $select
     * @return $this
     */
    public function select($select = '*')
    {
         $this->query .= 'SELECT ' . $select;
        return $this;
    }

    /**
     * @param $tableName
     * @return $this
     */
    public function from($tableName)
    {
        $this->query .= ' FROM ' . $tableName;
        return $this;
    }

    /**
     * @param $name
     * @param $param
     * @return $this
     */
    public function where($name, $param)
    {
        $where = stristr($this->query, 'WHERE') ? ' AND WHERE' : ' WHERE';
        $where .= " $name='$param' ";
        $this->query .= $where;
        return $this;
    }

    /**
     * @param $tableName
     * @return $this
     */
    public function insert($tableName)
    {
        $this->query .= 'INSERT INTO ' . $tableName;
        return $this;
    }

    /**
     * @param $values
     * @return $this
     */
    public function set($values)
    {
        $set = ' SET ';
        foreach ($values as $key => $value) {
            $set .= "$key = " . '"' . $value . '",';
        }
        $this->query .= rtrim($set,', ');
        return $this;
    }

    /**
     * @param $tableName
     * @return $this
     */
    public function update($tableName)
    {
        $this->query .= 'UPDATE ' . $tableName;
        return $this;
    }

    /**
     * @param $tableName
     * @return $this
     */
    public function delete($tableName)
    {
        $this->query .= 'DELETE FROM ' . $tableName;
        return $this;
    }

    /**
     * @param $columnName
     * @return $this
     */
    public function orderBy($columnName)
    {
        $this->query .= ' ORDER BY ' . $columnName;
        return $this;
    }

    /**
     * @return $this|null
     */
    public function execute()
    {
        if (!$this->query) {
            return null;
        }
        $this->executeResult = $this->connection->query($this->query);
        $this->executeResult->execute();
        $this->query = '';
        return $this;
    }

    /**
     * @return mixed
     */
    public function asTable()
    {
        return $this->executeResult->fetchAll();
    }

    /**
     * @return mixed
     */
    public function asRaw()
    {
        return $this->executeResult->fetch();
    }

}