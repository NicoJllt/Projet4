<?php
// MODEL NEWS
class Users
{
  protected $errors = [],
    $userId,
    $username,
    $mail,
    $password,
    $registrationDate;

  const INVALID_USERNAME = 1;
  const INVALID_MAIL = 2;
  const INVALID_PASSWORD = 3;

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

  public function setId($userId)
  {
    $this->userId = (int) $userId;
  }

  public function setUsername($username)
  {
    if (!is_string($username) || empty($username)) {
      $this->errors[] = self::INVALID_USERNAME;
    } else {
      $this->username = $username;
    }
  }

  public function setMail($mail)
  {
    if (!is_string($mail) || empty($mail)) {
      $this->errors[] = self::INVALID_MAIL;
    } else {
      $this->mail = $mail;
    }
  }

  public function setPassword($password)
  {
    if (!is_string($password) || empty($password)) {
      $this->errors[] = self::INVALID_PASSWORD;
    } else {
      $this->password = $password;
    }
  }

  public function setregistrationDate($registrationDate)
  {
    $this->registrationDate = (int) $registrationDate;
  }

  public function isNew()
  {
    return is_null($this->userId);
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

  public function userId()
  {
    return $this->userId;
  }

  public function username()
  {
    return $this->username;
  }

  public function mail()
  {
    return $this->mail;
  }

  public function password()
  {
    return $this->password;
  }

  public function registrationDate()
  {
    return $this->registrationDate;
  }
}
