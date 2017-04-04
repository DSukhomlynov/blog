<?php

class Blog
{

    public static function getEntryList()
    {    //Получаем публикации из базы
        $db = Db::getConnection();
        $EntryList = array();

        $result = $db->query('SELECT id, author, date, comments, content FROM entry ORDER BY id DESC LIMIT 100');

        $i = 0;
        while ($row = $result->fetch()) {
            $EntryList[$i]['id'] = $row['id'];
            $EntryList[$i]['author'] = $row['author'];
            $EntryList[$i]['date'] = $row['date'];
            $EntryList[$i]['comments'] = $row['comments'];
            $EntryList[$i]['content'] = $row['content'];
            $i++;
        }

        return $EntryList;
    }

    public static function getEntryItemByID($id)  //Получаем публикацию из базы по номеру
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();
            $result = $db->query('SELECT * FROM entry WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $EntryItem = $result->fetch();

            return $EntryItem;
        }
    }

    public static function getEntryItemByIDComment($id) //Получаем комментарии из базы но номеру публикации
    {
        $db = Db::getConnection();
        $EntryListComments = array();

        $result = $db->query('SELECT id, author, comment FROM comments ORDER BY id ASC LIMIT 100');

        $i = 0;
        while ($row = $result->fetch()) {
            if ($row['id'] == $id) {
                $EntryListComments[$i]['id'] = $row['id'];
                $EntryListComments[$i]['author'] = $row['author'];
                $EntryListComments[$i]['comment'] = $row['comment'];
                $i++;
            }
        }

        return $EntryListComments;
    }


    public static function addRecording($author, $content) //Добавляем публикацию в базу
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO entry (author, content) '
            . 'VALUES (:author, :content)';

        $result = $db->prepare($sql);
        $result->bindParam(':author', $author, PDO::PARAM_STR);
        $result->bindParam(':content', $content, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function addComments($id, $author, $comment) // Добавляем комментарий и увеличиваем на 1 количество комментариев
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $sql = 'INSERT INTO comments (id, author, comment) '
                . 'VALUES (:id, :author, :comment)';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_STR);
            $result->bindParam(':author', $author, PDO::PARAM_STR);
            $result->bindParam(':comment', $comment, PDO::PARAM_STR);


            $result1 = $db->query('SELECT * FROM entry WHERE id=' . $id);
            $result1->setFetchMode(PDO::FETCH_ASSOC);

            $EntryItem1 = $result1->fetch();
            $comments = $EntryItem1['comments'] + 1;
            $sql2 = "UPDATE entry 
            SET comments = :comments
            WHERE id = :id";


            $result2 = $db->prepare($sql2);
            $result2->bindParam(':id', $id, PDO::PARAM_STR);
            $result2->bindParam(':comments', $comments, PDO::PARAM_STR);
            $result2->execute();

            return $result->execute();
        }
    }

    public static function getEntryListSortMod()
    {    //Получаем публикации из базы для сортировки
        $db = Db::getConnection();
        $EntryListSort = array();

        $result = $db->query('SELECT id, author, date, comments, content FROM entry ORDER BY id DESC LIMIT 100');

        $i = 0;
        while ($row = $result->fetch()) {
            $EntryListSort[$i]['id'] = $row['id'];
            $EntryListSort[$i]['author'] = $row['author'];
            $EntryListSort[$i]['date'] = $row['date'];
            $EntryListSort[$i]['comments'] = $row['comments'];
            $EntryListSort[$i]['content'] = $row['content'];
            $i++;
        }
        // Получение списка столбцов
        foreach ($EntryListSort as $key => $row) {
            $comments[$key] = $row['comments'];
        }
        if (!empty($EntryListSort)) {
            array_multisort($comments, SORT_DESC, $EntryListSort);
        }
        $offset = 0;
        $length = 5;
        $EntryListSort = array_slice($EntryListSort, $offset, $length);

        $quantity =  count($EntryListSort);

        while($quantity < 5)
        {
            $EntryListSort[$quantity]['id'] = 0;
            $EntryListSort[$quantity]['author'] = 'NoNaMe';
            $EntryListSort[$quantity]['date'] = 'NoDaTe';
            $EntryListSort[$quantity]['comments'] = '0';
            $EntryListSort[$quantity]['content'] = '...';
            $quantity++;
        }

        return $EntryListSort;
    }
}