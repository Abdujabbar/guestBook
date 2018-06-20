<?php
/**
 * Created by PhpStorm.
 * User: abdujabbor
 * Date: 6/20/18
 * Time: 11:42 AM
 */
namespace Repository;
interface IRepository {
    public function save(\Post $data);
    public function deleteByPK(int $id);
    public function getTotal():int;
    public function getList(int $limit, int $offset):array;
}