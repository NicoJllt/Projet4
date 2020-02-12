<?php
// CONTROLLER DES MESSAGES
class MessagesController
{
    private $manager;

    function __construct()
    {
        $db = DBFactory::getPDOConnection();
        $this->manager = new MessagesManager_PDO($db);
    }
}
