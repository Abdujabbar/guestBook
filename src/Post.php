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

        $this->createdAt = time();
    }

    public function validate($clearErrors = true)
    {
        if($clearErrors) {
            $this->clearErrors();
        }

        $this->beforeValidate();
        if (!filter_var($this->author, FILTER_VALIDATE_EMAIL)) {
            $this->errors['author'] = 'author field must require email address';
        }
        $reflection = new ReflectionObject($this);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        foreach ($properties as $property) {
            if (empty($this->{$property->name}) && empty($this->errors[$property->name])) {
                $this->errors[$property->name] = "{$property->name} field cannot be empty";
            }
        }

        $this->afterValidate();
        return count($this->errors) === 0;
    }

    public function afterValidate()
    {

    }

    public function beforeValidate()
    {
        if (!empty($_FILES['image']) && $_FILES['image']['name']) {
            if (!in_array($_FILES['image']['type'], ['image/jpeg', 'image/png'])) {
                $this->setAttributeError('image', 'image: Available only image/(jpeg|png) files');
            } else {
                copy($_FILES['image']['tmp_name'], MEDIA_PATH . DIRECTORY_SEPARATOR . $_FILES['image']['name']);
                $this->image = $_FILES['image']['name'];
            }
        }
    }

    public function clearErrors()
    {
        $this->errors = [];
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getError($attribute = '') {
        return $this->errors[$attribute] ?? $this->errors[$attribute];
    }

    public function setAttributeError($name = '', $message = '')
    {
        $this->errors[$name] = $message;
    }
}