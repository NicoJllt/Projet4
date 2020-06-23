<?php
// CONTROLLER DES UTILISATEURS

require_once('../entity/Users.php');
require_once('../model/UsersManager_PDO.php');
require_once('../db/DBFactory.php');

class UsersController
{
    private $manager;

    function __construct()
    {
        $db = DBFactory::getPDOConnection();
        $this->manager = new UsersManager_PDO($db);
    }

    function logInUser($id, $pwd, $username, $mail)
    {
        $logIn = $this->manager->logIn($id, $pwd, $username, $mail);
        return $logIn;
    }

    function subscribeUser($username, $mail, $pwd, $confirmPwd)
    {
        $create = new Users(array('username' => $username, 'mail' => $mail, 'password' => $pwd, 'confirm-password' => $confirmPwd));
        $this->manager->save($create);
        return $create;
    }

    function deleteUser($id) {
        $this->manager->delete($id);
    }
}
