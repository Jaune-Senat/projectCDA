<?php

namespace App\Entity;

use App\Repository\ParticipateRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipateRepository::class)]
class Participate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_entry = null;

    #[ORM\ManyToOne(inversedBy: 'participates')]
    private ?Event $id_event = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEntry(): ?int
    {
        return $this->id_entry;
    }

    public function setIdEntry(int $id_entry): static
    {
        $this->id_entry = $id_entry;

        return $this;
    }

    public function getIdEvent(): ?Event
    {
        return $this->id_event;
    }

    public function setIdEvent(?Event $id_event): static
    {
        $this->id_event = $id_event;

        return $this;
    }
}
