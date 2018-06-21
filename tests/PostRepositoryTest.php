<?php
/**
 * Created by PhpStorm.
 * User: abdujabbor
 * Date: 6/20/18
 * Time: 2:42 PM
 */

class PostRepositoryTest extends \PHPUnit\Framework\TestCase
{
    protected $pdo;

    public function __construct(string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    public function testReadWrite()
    {
        $postRepository = new \Repository\PostRepository();
        $post = new Post();
        $post->author = "'abdujabbor1987@gmail.com";
        $post->title = "'dummy title";
        $post->content = \Random\RandomGenerator::getInstance()->randomSequence(30);
        $post->image = \Random\RandomGenerator::getInstance()->randomSequence(30);

        $this->assertEquals(true, $postRepository->save($post));

        $storedPosts = $postRepository->getPostByTitle($post->title);
        $currentRowsCount = count($storedPosts);
        $this->assertEquals(true, $currentRowsCount > 0);
        $firstPost = array_shift($storedPosts);

        $this->assertEquals(true, $firstPost !== NULL);
        $postRepository->deleteByPk($firstPost->id);

        $restStoredPosts = $postRepository->getPostByTitle($post->title);

        $this->assertEquals(count($storedPosts), count($restStoredPosts));
    }

}