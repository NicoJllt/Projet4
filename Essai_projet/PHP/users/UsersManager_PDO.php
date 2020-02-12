<?php
// MANAGER PDO DES UTILISATEURS
class MessagesManager_PDO extends MessagesManager
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
        $requete = $this->dataBase->prepare('INSERT INTO users (login, password) VALUES (:login, :password)');
        $requete->bindValue(':login', $user->login(), PDO::PARAM_STR);
        $requete->bindValue(':password', $user->password(), PDO::PARAM_STR);
        $requete->execute();
        $user = $this->getUnique($this->dataBase->lastInsertId());
    }

    public function delete($id)
    {
        $requete = $this->dataBase->prepare('DELETE FROM users WHERE userId = ' . (int) $id);
        $requete->execute();
    }

    public function getUnique($id)
    {
        $requete = $this->dataBase->prepare('SELECT * FROM users WHERE userId = :userId');
        $requete->bindValue(':userId', (int) $id, PDO::PARAM_INT);
        $requete->execute();
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Users');
        return $requete->fetch();
    }

    protected function update(Users $user)
    {
        $requete = $this->dataBase->prepare('UPDATE users SET login = :login, password = :password WHERE userId = :userId');
        $requete->bindValue(':login', $user->login(), PDO::PARAM_STR);
        $requete->bindValue(':password', $user->password(), PDO::PARAM_STR);
        $requete->execute();
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
        $requete = $this->dataBase->prepare('SELECT * FROM users WHERE login LIKE :login ORDER BY login ASC');
        // On associe les valeurs aux paramètres de la requête
        $requete->bindValue(':login', '%' . $name . '%', PDO::PARAM_STR);
        // On exécute la requête
        $requete->execute();
        // On associe un objet de type Cities à chaque réponse
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Users');
        // On collecte et retourne les réponses
        return $requete->fetchAll();
    }
}

