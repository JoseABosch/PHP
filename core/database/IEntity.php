<?php
namespace DWES\core\database;
interface IEntity
{
    public function getId() : int;
    public function toArray() : array;
}
