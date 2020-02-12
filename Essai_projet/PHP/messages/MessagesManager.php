<?php
// MANAGER DES MESSAGES
abstract class MessagesManager
{
  abstract protected function add(Messages $message);

  abstract public function delete($id);

  abstract public function getUnique($id);

  public function save(Messages $message) {
    if ($message->isValid())
    {
      $message->isNew() ? $this->add($message) : $this->edit($message);
    }
    else
    {
      throw new RuntimeException('Le message doit être valide pour être enregistré');
    }
  }

  abstract protected function update(Messages $message);

  abstract public function marked($marked);
}