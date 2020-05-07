<?php
// MANAGER PDO DES NEWS

require_once('NewsManager.php');

class NewsManager_PDO extends NewsManager
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

    protected function add(News $news)
    {
        $requete = $this->dataBase->prepare('INSERT INTO news (title, content) VALUES (:title, :content)');
        $requete->bindValue(':title', $news->title(), PDO::PARAM_STR);
        $requete->bindValue(':content', $news->content(), PDO::PARAM_STR);
        $requete->execute();
        $news = $this->getUnique($this->dataBase->lastInsertId());
    }

    public function delete($id)
    {
        $requete = $this->dataBase->prepare('DELETE FROM news WHERE newsId = :id');
        $requete->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $requete->execute();
    }

    public function getUnique($id)
    {
        $requete = $this->dataBase->prepare('SELECT * FROM news WHERE newsId = :newsId');
        $requete->bindValue(':newsId', (int) $id, PDO::PARAM_INT);
        $requete->execute();
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');
        return $requete->fetch();
    }

    protected function update(News $news)
    {
        $requete = $this->dataBase->prepare('UPDATE news SET title = :title, content = :content WHERE newsId = :newsId');
        $requete->bindValue(':title', $news->title(), PDO::PARAM_STR);
        $requete->bindValue(':content', $news->content(), PDO::PARAM_STR);
        $requete->execute();
    }

    public function listAll()
    {
        // Une requête sans paramètre : on fait un query directement
        $requete = $this->dataBase->query('SELECT * FROM news');
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');
        // On collecte et retourne les réponses
        return $requete->fetchAll();
    }

    public function firstNews()
    {
        // Requête de récupération des 10 premières news publiées classées dans l'ordre ascendant
        $requete = $this->dataBase->query('SELECT * FROM news ORDER BY dateNews ASC LIMIT 10');
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');
        return $requete->fetchAll();
    }

    public function lastNews()
    {
        // Requête de récupération des 2 dernières news publiées classées dans l'ordre descendant
        $requete = $this->dataBase->query('SELECT * FROM news ORDER BY dateNews DESC LIMIT 2');
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');
        return $requete->fetchAll();
    }

    public function searchByName($title)
    {
        // Une requête avec des paramètres : on utilise une requête préparée
        $requete = $this->dataBase->prepare('SELECT * FROM news WHERE title LIKE :title');
        // On associe les valeurs aux paramètres de la requête
        $requete->bindValue(':title', '%' . $title . '%', PDO::PARAM_STR);
        // On exécute la requête
        $requete->execute();
        // On associe un objet de type Name à chaque réponse
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');
        // On collecte et retourne les réponses
        return $requete->fetchAll();
    }
}