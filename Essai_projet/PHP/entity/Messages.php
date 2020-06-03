<?php
// MODEL MESSAGES
class Messages
{
  protected $errors = [],
    $messageId,
    $userName,
    $dateMessage,
    $idUser,
    $idNews,
    $idMessage,
    $content,
    $markedMessage;

  const INVALID_CONTENT = 1;

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

  public function setMessageId($messageId)
  {
    $this->messageId = (int) $messageId;
  }

  public function setUserName($userName)
  {
    if (!is_string($userName) || empty($userName)) {
      $this->errors[] = self::INVALID_CONTENT;
    } else {
      $this->userName = $userName;
    }
  }

  public function setDateMessage($dateMessage)
  {
    if (!date_parse($dateMessage)) {
      $this->errors[] = self::INVALID_CONTENT;
    } else {
      $this->dateMessage = $dateMessage;
    }
  }

  public function setIdUser($idUser)
  {
    $this->idUser = $idUser;
  }

  public function setIdNews($idNews)
  {
    $this->idNews = $idNews;
  }

  public function setIdMessage($idMessage)
  {
    $this->idMessage = $idMessage;
  }

  public function setContent($content)
  {
    if (!is_string($content) || empty($content)) {
      $this->errors[] = self::INVALID_CONTENT;
    } else {
      $this->content = $content;
    }
  }

  public function setMarkedMessage($markedMessage)
  {
    if ($markedMessage === NULL) {
      $this->markedMessage = $markedMessage;
    } else {
      $this->error[] = $markedMessage;
    }
  }

  public function isNew()
  {
    return is_null($this->messageId);
  }

  public function isValid()
  {
    return empty($this->errors);
  }

  // GETTERS //

  public function errors()
  {
    return $this->errors;
  }

  public function messageId()
  {
    return $this->messageId;
  }

  public function userName()
  {
    return $this->userName;
  }

  public function dateMessage()
  {
    return $this->dateMessage;
  }

  public function idUser()
  {
    return $this->idUser;
  }

  public function idNews()
  {
    return $this->idNews;
  }

  public function idMessage()
  {
    return $this->idMessage;
  }

  public function content()
  {
    return $this->content;
  }

  public function markedMessage()
  {
    return $this->markedMessage;
  }
}
