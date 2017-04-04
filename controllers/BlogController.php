<?php

include_once ROOT . '/models/Blog.php';

class BlogController
{
    public function actionIndex()
    {
        require_once(ROOT . '/views/blog/title.php');

        return true;
    }

    public function actionList()  // Список новостей
    {
        $name = '';
        $text = '';

        if (isset($_POST['submit'])) {

            $name = strip_tags($_POST['name']); //Защита от XSS
            $text = strip_tags($_POST['text']); //Защита от XSS

            unset($_POST);
            $url = '/list-of-records/';
            header("Location: $url");
            $result = Blog::addRecording($name, $text);
        }

        $entryList = array();
        $entryList = Blog::getEntryList();

        $entryListSort = array();
        $entryListSort = Blog::getEntryListSortMod();

        require_once(ROOT . '/views/blog/list-of-records.php');

        return true;
    }

    public function actionView($id)  //Одна новость
    {
        if ($id) {
            $entryItem = Blog::getEntryItemByID($id);
            $entryComment = Blog::getEntryItemByIDComment($id);

            $name = '';
            $comment = '';

            if (isset($_POST['submit'])) {
                $name = strip_tags($_POST['name']); //Защита от XSS
                $comment = strip_tags($_POST['comment']); //Защита от XSS

                unset($_POST);

                $path = $entryItem['id'];

                $url = "/one-entry/$path";
                header("Location: $url");
                $result = Blog::addComments($id, $name, $comment);
            }
            require_once(ROOT . '/views/blog/one-entry.php');
        }
        return true;
    }
}