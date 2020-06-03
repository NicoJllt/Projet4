<?php
// CONTROLLER DES MESSAGES

require_once('../entity/News.php');
require_once('../model/MessagesManager_PDO.php');
require_once('../db/DBFactory.php');

class MessagesController
{
    private $manager;

    function __construct()
    {
        $db = DBFactory::getPDOConnection();
        $this->manager = new MessagesManager_PDO($db);
    }

    function getMessages($id)
    {
        $message = $this->manager->getUnique($id);
        return $message;
    }

    function createMessage($userName, $dateMessage, $content)
    {
        $create = new Messages(array('userName' => $userName, 'dateMessage' => $dateMessage, 'content' => $content));
        $this->manager->save($create);
        return $create;
    }

    function deleteMessage($id)
    {
        $this->manager->delete($id);
    }
}
