<?php
// MANAGER DES MESSAGES
abstract class MessagesManager
{
  abstract protected function add(Messages $message);

  abstract protected function update(Messages $message);

  abstract public function delete($id);

  abstract public function getUnique($id);

  abstract public function listAll();

  abstract public function marked($marked);

  public function save(Messages $message) {
    if ($message->isValid())
    {
      $message->isNew() ? $this->add($message) : $this->update($message);
    }
    else
    {
      throw new RuntimeException('Le message doit être valide pour être enregistré');
    }
  }
}