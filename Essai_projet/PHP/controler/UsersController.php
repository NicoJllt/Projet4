<?php
// CONTROLLER DES UTILISATEURS
class UsersController
{
    private $manager;

    function __construct()
    {
        $db = DBFactory::getPDOConnection();
        $this->manager = new UsersManager_PDO($db);
    }

    function logInUser($id)
    {
        if (isset($login) && isset($password)) {
            $logIn = $this->manager->logIn($id);
            return $logIn;
        }
    }

    function subscribeUser($userId, $login, $password)
    {
        $create = new Users(array('userId' => $userId, 'login' => $login, 'password' => $password));
        $this->manager->subscribre($create);
        return $create;
    }

}
