<?php
// MODEL NEWS
class News
{
  protected $errors = [],
    $newsId,
    $title,
    $content,
    $dateNews;

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
}
