<?php
// MANAGER DES UTILISATEURS
abstract class UsersManager
{
  abstract protected function add(Users $user);

  abstract public function delete($id);

  abstract public function getUnique($id);

  public function save(Users $user) {
    if ($user->isValid())
    {
      $user->isNew() ? $this->add($user) : $this->edit($user);
    }
    else
    {
      throw new RuntimeException('L\'utilisateur doit être valide pour être enregistré');
    }
  }

  abstract protected function update(Users $user);
}