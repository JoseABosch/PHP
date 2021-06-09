<?php
namespace DWES\core\database;
use DWES\core\App;
use PDO;

abstract class QueryBuilder
{
    private PDO $connection;
    private string $table;
    private string $entityClass;

    /**
     * QueryBuilder constructor.
     * @param PDO $connection
     * @param string $table
     * @param string $entityClass
     */
    public function __construct(string $table, string $entityClass)
    {
        $this->connection = App::get('connection');
        $this->table = $table;
        $this->entityClass = $entityClass;
    }

    public function findAll() : array
    {
        $sql = "select * from $this->table;";
        $pdoStatement = $this->connection->prepare($sql);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $this->entityClass);
    }

    public function findAllOrderBy(string $column) : array
    {
        $sql = "select * from $this->table order by $column;";
        $pdoStatement = $this->connection->prepare($sql);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $this->entityClass);
    }

    public function findAllEqual(array $columnas,array  $valores,array $operadores = null, $orderBy = null, $order = null) : array
    {
        $sql = "select * from $this->table ";

        if(sizeof($columnas) > 0 && sizeof($valores) >0)
        {
            if (sizeof($operadores) == 0) {
                for ($i = 0; $i < sizeof($columnas); $i++) {
                    if ($i == 0) $sql.=" where ";
                    if ($i > 0) $sql.=" and ";
                    $sql .= $columnas[$i] . " = " . $valores[$i] . " ";
                }
            } else {
                for ($i = 0; $i < sizeof($columnas); $i++) {
                    if ($i == 0) $sql.=" where ";
                    if ($i > 0) $sql.=" and ";
                    $sql .= $columnas[$i] . " " . $operadores[$i] . " " . $valores[$i] . " ";
                }
            }
        }

        if($orderBy != null && $order != null)
        {
            $sql .= ' order by '.$orderBy.' '.$order;
        }
        $sql.= ";";
        $pdoStatement = $this->connection->prepare($sql);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $this->entityClass);
    }

    public function findAllOrderByDesc(string $column) : array
    {
        $sql = "select * from $this->table order by $column desc;";
        $pdoStatement = $this->connection->prepare($sql);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $this->entityClass);
    }

    public function find(int $id) : ?IEntity
    {
        $sql = "select * from $this->table where id=$id;";
        $pdoStatement = $this->connection->prepare($sql);
        $pdoStatement->execute();
        $pdoStatement->setFetchMode( PDO::FETCH_CLASS, $this->entityClass);
        return $pdoStatement->fetch(PDO::FETCH_CLASS);
    }

    public function findBy(array $criterios) : array
    {
        $strCriterios = implode(' AND ',
            array_map(
                function($criterio) {
                    return $criterio . ' = :' . $criterio;
                },
                array_keys($criterios)
            )
        );

        $sql = sprintf("select * from %s where %s;",
            $this->table,
            $strCriterios
        );
        $pdoStatement = $this->connection->prepare($sql);
        $pdoStatement->execute($criterios);
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, $this->entityClass);
    }

    public function findOneBy(array $criterios) : ?IEntity
    {
        $entities = $this->findBy($criterios);
        if (count($entities) > 1)
            throw new \Exception('El método findOneBy está obteniendo más de un elemento como resultado');

        if (count($entities) === 1)
            return $entities[0];

        return null;
    }


    public function save(IEntity $entidad) : bool
    {
        $parametros = $entidad->toArray();

        $campos = implode(', ', array_keys($parametros));
        $valores = ':' . implode(', :', array_keys($parametros));
        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s);",
            $this->table,
            $campos,
            $valores
        );
        $pdoStatement = $this->connection->prepare($sql);
        return $pdoStatement->execute($parametros);
    }

    public function update(IEntity $entidad) : bool
    {
        $parametros = $entidad->toArray();

        $campos = '';
        foreach ($parametros as $nombre => $valor)
            $campos .= "$nombre=:$nombre, ";
        $campos = rtrim($campos, ', ');

        $sql = sprintf(
            "UPDATE %s set %s WHERE id = %s;",
            $this->table,
            $campos,
            $entidad->getId()
        );
        $pdoStatement = $this->connection->prepare($sql);
        return $pdoStatement->execute($parametros);
    }

    public function delete(IEntity $entity) : bool
    {
        $sql = sprintf(
            "DELETE FROM %s WHERE id = :id;",
            $this->table
        );
        $pdoStatement = $this->connection->prepare($sql);

        $id = $entity->getId();
        $pdoStatement->bindParam('id', $id);
        return $pdoStatement->execute();
    }

    /**
     * @return PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }
}