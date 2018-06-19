<?php
/**
 * Created by PhpStorm.
 * User: abdujabbor
 * Date: 6/19/18
 * Time: 3:54 PM
 */
namespace View;
class View
{
    public $layout = "layout";

    public function __construct($layout)
    {
        $this->layout = $this->getLayout($layout);
    }

    protected function getLayout() {
        return $this->getFullPathView($this->layout);
    }

    protected function getFullPathView($view) {
        return TEMPLATE_PATH . DIRECTORY_SEPARATOR . $view . ".php";
    }

    /**
     * @param $view
     * @param array $data
     * @throws \Exception
     */
    public function render($view, $data = []) {
        $filePath = $this->getFullPathView($view);
        if(!file_exists($filePath)) {
            throw new \Exception("View: {$view} doesn't exists");
        }
        if(!file_exists($this->layout)) {
            throw new \Exception("Layout: {$this->layout} doesn't exists");
        }
        extract($data);
        ob_start();

        require_once $filePath;

        $content = ob_get_contents();
        ob_clean();
        include_once $this->layout;
    }
}