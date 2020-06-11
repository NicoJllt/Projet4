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
        // On récupère la dernière news
        $prev = $this->XNewsFrom(1, 0, false)[0];

        $requete = $this->dataBase->prepare('INSERT INTO news (title, content, previous) VALUES (:title, :content, :previous)');
        $requete->bindValue(':title', $news->title(), PDO::PARAM_STR);
        $requete->bindValue(':content', $news->content(), PDO::PARAM_STR);
        // La valeur de previous dans la nouvelle news est l'id de $prev
        $requete->bindValue(':previous', $prev->previous(), PDO::PARAM_INT);
        $requete->execute();
        $lastId = $this->dataBase->lastInsertId();
        $news->setNewsId($lastId);

        // On met à jour la valeur de next dans $prev
        $prev->setNext($lastId);
        $this->update($prev);
    }

    public function delete($id)
    {
        // Récupérer la news à supprimer
        $deleted = $this->getUnique($id);
        $requete = $this->dataBase->prepare('DELETE FROM news WHERE newsId = :newsId');
        $requete->bindValue(':newsId', (int) $id, PDO::PARAM_INT);
        $requete->execute();
        // Récupérer la news d'avant et la news d'après puis répartir les previous et next
        // de la news supprimée
        $prev = $this->getUnique($deleted->previous());
        $next = $this->getUnique($deleted->next());
        $next->setPrevious($deleted->previous());
        $prev->setNext($deleted->next());
        $this->update($prev);
        $this->update($next);
    }

    public function XNewsFrom($nb, $offset, bool $asc)
    {
        // Requête de récupération des 10 épisodes suivants classées dans l'ordre ascendant
        $requete = $this->dataBase->prepare('SELECT * FROM news ORDER BY newsId ' . ($asc ? 'ASC' : 'DESC') . ' LIMIT :offset, :nb');
        $requete->bindValue(':nb', (int) $nb, PDO::PARAM_INT);
        $requete->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');
        $requete->execute();
        return $requete->fetchAll();
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
        $requete = $this->dataBase->prepare('UPDATE news SET title = :title, content = :content, previous = :previous, next = :next WHERE newsId = :newsId');
        $requete->bindValue(':title', $news->title(), PDO::PARAM_STR);
        $requete->bindValue(':content', $news->content(), PDO::PARAM_STR);
        $requete->bindValue(':newsId', $news->newsId(), PDO::PARAM_INT);
        $requete->bindValue(':previous', $news->previous(), PDO::PARAM_INT);
        $requete->bindValue(':next', $news->next(), PDO::PARAM_INT);

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
