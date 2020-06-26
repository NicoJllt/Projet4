<?php
// MANAGER PDO DES UTILISATEURS
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
        $requete = $this->dataBase->prepare('INSERT INTO users (username, mail, password, confirm-password, date_inscription) VALUES (:username, :mail, :password, :confirm-password, CURDATE())');
        $requete->bindValue(':username', $user->username(), PDO::PARAM_STR);
        $requete->bindValue(':mail', $user->mail(), PDO::PARAM_STR);
        $requete->bindValue(':password', $user->password(), PDO::PARAM_STR);
        $requete->bindValue(':confirm-password', $user->confirmPassword(), PDO::PARAM_STR);

        $requete->execute(array(
            'username' => $username,
            'password' => $password,
            'mail' => $mail
        ));

        $user = $this->getUnique($this->dataBase->lastInsertId());
    }

    public function delete($id)
    {
        $requete = $this->dataBase->prepare('DELETE FROM users WHERE userId = ' . (int) $id);
        $requete->execute();
    }

    protected function update(Users $user)
    {
        $requete = $this->dataBase->prepare('UPDATE users SET login = :login, password = :password WHERE userId = :userId');
        $requete->bindValue(':username', $user->username(), PDO::PARAM_STR);
        $requete->bindValue(':password', $user->password(), PDO::PARAM_STR);
        $requete->bindValue(':userId', $user->userId(), PDO::PARAM_INT);
        $requete->execute();
    }

    public function logIn($id, $pwd, $username, $mail, $resultat)
    {
        $requete = $this->dataBase->prepare('SELECT userId, password FROM users WHERE username = :username, mail = :mail');
        $requete->bindValue(':userId', (int) $id, PDO::PARAM_INT);
        $requete->bindValue(':password', $pwd, PDO::PARAM_STR);
        $requete->bindValue(':username', $username, PDO::PARAM_STR);
        $requete->bindValue(':mail', $mail, PDO::PARAM_STR);

        $requete->execute(array(
            'username' => $username,
            'mail' => $mail
        ));

        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Users');
        $resultat = $requete->fetch();
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

    public function searchByName($name)
    {
        // Une requête avec des paramètres : on utilise une requête préparée
        $requete = $this->dataBase->prepare('SELECT * FROM users WHERE username LIKE :username ORDER BY username ASC');
        // On associe les valeurs aux paramètres de la requête
        $requete->bindValue(':username', '%' . $name . '%', PDO::PARAM_STR);
        // On exécute la requête
        $requete->execute();
        // On associe un objet de type Cities à chaque réponse
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Users');
        // On collecte et retourne les réponses
        return $requete->fetchAll();
    }
}
