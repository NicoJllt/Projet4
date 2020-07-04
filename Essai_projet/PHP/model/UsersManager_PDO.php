<?php
// MANAGER PDO DES UTILISATEURS

require_once('UsersManager.php');

class UsersManager_PDO extends UsersManager
{
    /**
     * Attribut contenant l'instance représentant la BDD.
     * @type PDO
     */
    protected $dataBase;

    /**
     * Constructeur étant chargé d'enregistrer l'instance de PDO dans l'attribut $db.
     * @param $db PDO Le DAO
     * @return void
     */
    public function __construct(PDO $db)
    {
        $this->dataBase = $db;
    }

    protected function add(Users $user)
    {
        $requete = $this->dataBase->prepare('INSERT INTO users (username, mail, password) VALUES (:username, :mail, :password)');
        $requete->bindValue(':username', $user->username(), PDO::PARAM_STR);
        $requete->bindValue(':mail', $user->mail(), PDO::PARAM_STR);
        $requete->bindValue(':password', $user->password(), PDO::PARAM_STR);
        $requete->execute();
        $temp = $this->getUnique($this->dataBase->lastInsertId());
        $user->setId($temp->userId());
        $user->setRegistrationDate($temp->registrationDate());
    }

    public function delete($id)
    {
        $requete = $this->dataBase->prepare('DELETE FROM users WHERE userId = ' . (int) $id);
        $requete->execute();
    }

    protected function update(Users $user)
    {
        $requete = $this->dataBase->prepare('UPDATE users SET password = :password WHERE userId = :userId');
        $requete->bindValue(':password', $user->password(), PDO::PARAM_STR);
        $requete->bindValue(':userId', $user->userId(), PDO::PARAM_INT);
        $requete->execute();
    }

    public function searchById($id, $isPasswordCorrect)
    {
        $requete = $this->dataBase->prepare('SELECT * FROM users WHERE username = :username, mail = :mail, password = :password');
        if ($id == 'username') {
            $requete->bindValue(':username', $id, PDO::PARAM_STR);
        } else if ($id == 'mail') {
            $requete->bindValue(':mail', $id, PDO::PARAM_STR);
        }

        if ($isPasswordCorrect == true) {
        $requete->bindValue(':password', $isPasswordCorrect, PDO::PARAM_STR);
        } else {
            echo 'Le mot de passe est incorrect';
        }

        $requete->execute();

        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Users');
        $requete->fetch();
    }

    public function getUnique($id)
    {
        $requete = $this->dataBase->prepare('SELECT * FROM users WHERE userId = :userId');
        $requete->bindValue(':userId', (int) $id, PDO::PARAM_INT);
        $requete->execute();
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Users');
        return $requete->fetch();
    }

    public function listAll()
    {
        // Une requête sans paramètre : on fait un query directement
        $requete = $this->dataBase->query('SELECT * FROM users');
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Users');
        // On collecte et retourne les réponses
        return $requete->fetchAll();
    }
}
