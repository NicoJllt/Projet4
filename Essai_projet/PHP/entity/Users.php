<?php
// MODEL NEWS
class Users
{
  protected $errors = [],
    $userId,
    $login,
    $password;

  const INVALID_LOGIN = 1;
  const INVALID_PASSWORD = 2;

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

  public function setLogin($login)
  {
    if (!is_string($login) || empty($login)) {
      $this->errors[] = self::INVALID_LOGIN;
    } else {
      $this->login = $login;
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

  // GETTERS //

  public function errors()
  {
    return $this->errors;
  }

  public function userId()
  {
    return $this->userId;
  }

  public function login()
  {
    return $this->login;
  }

  public function password()
  {
    return $this->password;
  }
}
