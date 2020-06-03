<?php
// MANAGER PDO DES MESSAGES
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

    protected function add(Messages $message)
    {
        $requete = $this->dataBase->prepare('INSERT INTO messages (userName, dateMessage, content) VALUES (:userName, :dateMessage, :content)');
        $requete->bindValue(':userName', $message->userName(), PDO::PARAM_STR);
        $requete->bindValue(':content', $message->content(), PDO::PARAM_STR);
        $requete->bindValue(':markedMessage', (int) $message->markedMessage(), PDO::PARAM_INT);
        $requete->execute();
        $message = $this->getUnique($this->dataBase->lastInsertId());
    }

    public function delete($id)
    {
        $deleted = $this->getUnique($id);
        $requete = $this->dataBase->prepare('DELETE FROM messages WHERE messageId = :messageId');
        $requete->bindValue(':messageId', (int) $id, PDO::PARAM_INT);
        $requete->execute();
    }

    public function getUnique($id)
    {
        $requete = $this->dataBase->prepare('SELECT * FROM messages WHERE messageId = :messageId');
        $requete->bindValue(':messageId', (int) $id, PDO::PARAM_INT);
        $requete->execute();
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Messages');
        return $requete->fetch();
    }

    protected function update(Messages $message)
    {
        $requete = $this->dataBase->prepare('UPDATE messages SET userName = :userName, dateMessage = :dateMessage, content = :content WHERE messageId = :messageId');
        $requete->bindValue(':userName', $message->userName(), PDO::PARAM_STR);
        $requete->bindValue(':dateMessage', $message->dateMessage(), PDO::PARAM_INT);
        $requete->bindValue(':content', $message->content(), PDO::PARAM_STR);
        $requete->bindValue(':messageId', $message->messageId(), PDO::PARAM_INT);
        $requete->execute();
    }

    public function listAll()
    {
        // Une requête sans paramètre : on fait un query directement
        $requete = $this->dataBase->query('SELECT * FROM messages');
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Messages');
        // On collecte et retourne les réponses
        return $requete->fetchAll();
    }

    public function searchByName($name)
    {
        // Une requête avec des paramètres : on utilise une requête préparée
        $requete = $this->dataBase->prepare('SELECT * FROM messages INNER JOIN users ON users.userId = messages.idUser WHERE users.login LIKE :login ORDER BY users.login ASC');
        // On associe les valeurs aux paramètres de la requête
        $requete->bindValue(':login', '%' . $name . '%', PDO::PARAM_STR);
        // On exécute la requête
        $requete->execute();
        // On associe un objet de type Cities à chaque réponse
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Messages');
        // On collecte et retourne les réponses
        return $requete->fetchAll();
    }
}
