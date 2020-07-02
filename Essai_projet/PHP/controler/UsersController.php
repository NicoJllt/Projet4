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

    function subscribeUser($username, $mail, $pwd, $confirmPwd)
    {
        if ($pwd === $confirmPwd) {

            password_hash($pwd, PASSWORD_DEFAULT);

            $create = new Users(array('username' => $username, 'mail' => $mail, 'password' => $pwd));
            if (count($create->errors() === 0)) {
                $this->manager->save($create);
                return $create;
            } else {
                echo 'Les informations comportent une erreur.';
            }
        } else {
            echo 'Les mots de passe ne concordent pas.';
        }
    }

    function logInUser($id, $isPasswordCorrect)
    {
        $logIn = $this->manager->searchById($id, $isPasswordCorrect);

        if (isset($logIn) == true) {
            session_start();
            $_SESSION['id'] = $id;
            echo 'Vous êtes connecté.';
        } else {
            echo 'Mauvais identifiant ou mot de passe.';
        }

        return $logIn;
    }

    function deleteUser($id)
    {
        $this->manager->delete($id);
    }
}
