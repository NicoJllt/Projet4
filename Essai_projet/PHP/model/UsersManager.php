<?php
// MANAGER DES UTILISATEURS
abstract class UsersManager
{
  abstract protected function add(Users $user);

  abstract protected function update(Users $user);

  abstract public function delete($id);

  abstract public function getUnique($id);

  abstract public function listAll();

  public function save(Users $user) {
    if ($user->isValid())
    {
      $user->isNew() ? $this->add($user) : $this->update($user);
    }
    else
    {
      throw new RuntimeException('L\'utilisateur doit être valide pour être enregistré');
    }
  }
}