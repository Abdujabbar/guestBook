<?php
/**
 * Created by PhpStorm.
 * User: abdujabbor
 * Date: 6/20/18
 * Time: 12:51 PM
 */

use PHPUnit\Framework\TestCase;

class PostTest extends TestCase {
    public function testValidation() {
        $post = new \Post();
        $post->title = 'dummy title';
        $post->content = 'dummy content';

        $this->assertEquals(false, $post->validate());
        $post->author = "abdujabbor1987@gmail.com";
        $post->createdAt = time();
        $post->image = Random\RandomGenerator::getInstance()->randomSequence(30);
        $this->assertEquals(true, $post->validate());

    }
}