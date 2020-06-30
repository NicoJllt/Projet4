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

    function subscribeUser($username, $mail, $passe_hache)
    {
        if (sizeof(new Users->errors !== 0)) {
            $create = new Users(array('username' => $username, 'mail' => $mail, 'password' => $passe_hache));
        } else {
            $this->manager->save($create);
            return $create;
        }
    }

    function logInUser($id, $pwd, $isPasswordCorrect)
    {
        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['id'] = $id;
            echo 'Vous êtes connecté.';
        } else {
            echo 'Mauvais identifiant ou mot de passe.';
        }

        $logIn = $this->manager->logIn($id, $pwd);
        return $logIn;
    }

    function deleteUser($id)
    {
        $this->manager->delete($id);
    }
}
