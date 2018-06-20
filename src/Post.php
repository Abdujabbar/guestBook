<?php
/**
 * Created by PhpStorm.
 * User: abdujabbor
 * Date: 6/20/18
 * Time: 11:48 AM
 */

class Post
{
    public $author;
    public $title;
    public $content;
    public $image;
    public $createdAt;
    protected $errors = [];

    public function __construct($data = [])
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function validate()
    {
        $this->clearErrors();

        if (!filter_var($this->author, FILTER_VALIDATE_EMAIL)) {
            $this->errors['author'] = 'author field must require email address';
        }
        $reflection = new ReflectionObject($this);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        foreach ($properties as $property) {
            if (empty($this->{$property->name})) {
                $this->errors[$property->name] = "{$property->name} field cannot be empty";
            }
        }
        return count($this->errors) === 0;
    }

    public function clearErrors()
    {
        $this->errors = [];
    }

    public function getErrors()
    {
        return $this->errors;
    }
}