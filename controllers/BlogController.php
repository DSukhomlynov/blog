<?php

include_once ROOT. '/models/Blog.php';

class BlogController
{
    public function actionIndex()
    {

        require_once(ROOT . '/views/blog/title.php');

        return true;
    }

    public function actionList()  // Список новостей
    {

        $entryList = array();
        $entryList = Blog::getEntryList();

        $entryListSortMod = array();
        $entryListSortMod = Blog::getEntryListSortMod();

        $name = '';
        $text = '';


        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $text = $_POST['text'];

            unset($_POST);
            $url = '/list_of_records/';
            header("Location: $url");
            $result = Blog::addNews($name, $text);
        }


        require_once(ROOT . '/views/blog/list_of_records.php');

        return true;
    }

    public function actionView($id)  //Одна новость
    {
        if ($id) {
            $entryItem = Blog::getEntryItemByID($id);
            $entryComment = Blog::getEntryItemByIDComment($id);

            $name = '';
            $comment = '';


            if (isset($_POST['submit'])){
                $name = $_POST['name'];
                $comment = $_POST['comment'];

                unset($_POST);

                $path = $entryItem['id'];

                $url = "/one_entry/$path";
                header("Location: $url");
                $result = Blog::addComments($id, $name, $comment);
            }

            require_once(ROOT . '/views/blog/one_entry.php');

        }

        return true;

    }

}