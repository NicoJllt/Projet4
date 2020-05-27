<?php
// MODEL NEWS
class News
{
  protected $errors = [],
    $newsId,
    $title,
    $content,
    $dateNews,
    $previous,
    $next;

  const INVALID_TITLE = 1;
  const INVALID_CONTENT = 2;

  public function __construct($valeurs = [])
  {
    if (!empty($valeurs)) {
      $this->hydrate($valeurs);
    }
  }

  public function hydrate($data)
  {
    foreach ($data as $attribute => $value) {
      $method = 'set' . ucfirst($attribute);

      if (is_callable([$this, $method])) {
        $this->$method($value);
      }
    }
  }

  // SETTERS //

  public function setNewsId($newsId)
  {
    $this->newsId = (int) $newsId;
  }

  public function setTitle($title)
  {
    if (!is_string($title) || empty($title)) {
      $this->errors[] = self::INVALID_TITLE;
    } else {
      $this->title = $title;
    }
  }

  public function setContent($content)
  {
    if (!is_string($content) || empty($content)) {
      $this->errors[] = self::INVALID_CONTENT;
    } else {
      $this->content = $content;
    }
  }

  public function setDateNews($dateNews)
  {    
    if (!date_parse ($dateNews)) {
      $this->errors[] = self::INVALID_CONTENT;
    } else {
      $this->dateNews = $dateNews;
    }
  }

  public function setPrevious($previous)
  {    
    if (is_null($previous) || !is_int($previous) || empty($previous)) {
      $this->errors[] = NULL;
    } else {
      $this->previous = $previous;
    }
  }
  
  public function setNext($next)
  {    
    if (is_null($next) || !is_int($next) || empty($next)) {
      $this->errors[] = NULL;
    } else {
      $this->next = $next;
    }
  }

  public function isNew() {
    return is_null($this->newsId);
  }

  public function isValid() {
    return empty($this->errors);
  }

  // GETTERS //

  public function errors()
  {
    return $this->errors;
  }

  public function newsId()
  {
    return $this->newsId;
  }

  public function title()
  {
    return $this->title;
  }

  public function content()
  {
    return $this->content;
  }

  public function dateNews()
  {
    return $this->dateNews;
  }

  public function previous()
  {
    return $this->previous;
  }

  public function next()
  {
    return $this->next;
  }
}
