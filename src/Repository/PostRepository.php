<?php
/**
 * Created by PhpStorm.
 * User: abdujabbor
 * Date: 6/20/18
 * Time: 11:43 AM
 */

namespace Repository;
class PostRepository implements IRepository
{
    protected $pdo;
    protected $table = 'posts';

    public function __construct()
    {
        $configurations = \Configs::getInstance()->getByName('db');
        $this->pdo = new \PDO($configurations['dsn'], $configurations['db_user'], $configurations['db_pass']);
    }

    public function save(\Post $post)
    {

        try {
            $query = "insert into {$this->table} (author, title, content, image, created_at) 
                      values(:author, :title, :content, :image, :createdAt)";
            $statement = $this->pdo->prepare($query);
            return $statement->execute([
                ':author' => $post->author,
                ':title' => $post->title,
                ':content' => $post->content,
                ':image' => $post->image,
                ':createdAt' => $post->createdAt]);
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    /**
     * @param int $id
     */
    public function deleteByPk(int $id)
    {
        try {
            $statement = $this->pdo->prepare("delete from {$this->table} where id = :id");
            $statement->execute([':id' => $id]);
        } catch (\PDOException $e) {
            throw new $e;
        }
    }

    public function getTotal(): int
    {
        try {
            $statement = $this->pdo->prepare("select count(*) as total from {$this->table}");
            $statement->execute();
            return $statement->fetch(\PDO::FETCH_OBJ)->total;
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function getList(int $limit, int $offset): array
    {
        try {
            $query = "select * from {$this->table} limit :offset, :limit";
            $statement = $this->pdo->prepare($query);
            $statement->bindParam(':offset', $offset, \PDO::PARAM_INT);
            $statement->bindParam(':limit', $limit, \PDO::PARAM_INT);
            $statement->execute();
            $statement->setFetchMode(\PDO::FETCH_OBJ);
            return $statement->fetchAll();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function getPostByTitle($title)
    {
        try {
            $statement = $this->pdo->prepare("select * from {$this->table} where title = :title order by id asc");
            $statement->bindParam(':title', $title, \PDO::PARAM_STR);
            $statement->execute();
            $statement->setFetchMode(\PDO::FETCH_OBJ);
            return $statement->fetchAll();
        } catch (\PDOException $e) {
            throw $e;
        }
    }
}