<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $date_event = null;

    #[ORM\Column]
    private ?bool $type_event = null;

    #[ORM\Column]
    private ?int $entry_limit = null;

    #[ORM\Column]
    private ?int $zipcode = null;

    #[ORM\Column(length: 50)]
    private ?string $town_event = null;

    #[ORM\Column(length: 150)]
    private ?string $street_name = null;

    #[ORM\Column]
    private ?int $street_number = null;

    #[ORM\Column(length: 20)]
    private ?string $street_type = null;

    /**
     * @var Collection<int, Participate>
     */
    #[ORM\OneToMany(targetEntity: Participate::class, mappedBy: 'id_event')]
    private Collection $participates;

    public function __construct()
    {
        $this->participates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getDateEvent(): ?\DateTime
    {
        return $this->date_event;
    }

    public function setDateEvent(\DateTime $date_event): static
    {
        $this->date_event = $date_event;

        return $this;
    }

    public function isTypeEvent(): ?bool
    {
        return $this->type_event;
    }

    public function setTypeEvent(bool $type_event): static
    {
        $this->type_event = $type_event;

        return $this;
    }

    public function getEntryLimit(): ?int
    {
        return $this->entry_limit;
    }

    public function setEntryLimit(int $entry_limit): static
    {
        $this->entry_limit = $entry_limit;

        return $this;
    }

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(int $zipcode): static
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getTownEvent(): ?string
    {
        return $this->town_event;
    }

    public function setTownEvent(string $town_event): static
    {
        $this->town_event = $town_event;

        return $this;
    }

    public function getStreetName(): ?string
    {
        return $this->street_name;
    }

    public function setStreetName(string $street_name): static
    {
        $this->street_name = $street_name;

        return $this;
    }

    public function getStreetNumber(): ?int
    {
        return $this->street_number;
    }

    public function setStreetNumber(int $street_number): static
    {
        $this->street_number = $street_number;

        return $this;
    }

    public function getStreetType(): ?string
    {
        return $this->street_type;
    }

    public function setStreetType(string $street_type): static
    {
        $this->street_type = $street_type;

        return $this;
    }

    /**
     * @return Collection<int, Participate>
     */
    public function getParticipates(): Collection
    {
        return $this->participates;
    }

    public function addParticipate(Participate $participate): static
    {
        if (!$this->participates->contains($participate)) {
            $this->participates->add($participate);
            $participate->setIdEvent($this);
        }

        return $this;
    }

    public function removeParticipate(Participate $participate): static
    {
        if ($this->participates->removeElement($participate)) {
            // set the owning side to null (unless already changed)
            if ($participate->getIdEvent() === $this) {
                $participate->setIdEvent(null);
            }
        }

        return $this;
    }
}
