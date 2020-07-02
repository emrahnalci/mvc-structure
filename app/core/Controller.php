<?php

class Controller
{

    /**
     * @param $model
     * @return mixed
     */
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
        //echo $model;
    }

    /**
     * @param $view
     * @param array $data
     */
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    /**
     * @param $folder
     * @param $fileRoad
     * @param $cache
     * @param $packs
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function twigView($folder, $fileRoad, $cache, $packs)
    {
        $loader = new \Twig\Loader\FilesystemLoader('../app/views/' . $folder . '/');
        if ($cache == TRUE) {
            $twig = new \Twig\Environment($loader, ['cache' => '../app/Cache/Site',]);
        } else {
            $twig = new \Twig\Environment($loader, ['debug' => true]);
        }

        return $twig->render($fileRoad, $packs);
    }

}
