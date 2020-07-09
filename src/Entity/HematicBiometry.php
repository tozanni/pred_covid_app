<?php

namespace App\Entity;

use App\Repository\HematicBiometryRepository;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=HematicBiometryRepository::class)
 * @Serializer\ExclusionPolicy("all")
 */
class HematicBiometry
{
    use EntityTrait;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     * @Serializer\Expose()
     */
    private $hematocrit;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     * @Serializer\Expose()
     */
    private $hemoglobin;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     * @Serializer\Expose()
     */
    private $leukocytes;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     * @Serializer\Expose()
     */
    private $platelets;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime_immutable")
     */
    private $created_at;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime_immutable")
     */
    private $updated_at;

    /**
     * @ORM\OneToOne(targetEntity=Record::class, mappedBy="hematicBiometry", cascade={"persist", "remove"})
     */
    private $record;

    public function getHematocrit(): ?float
    {
        return $this->hematocrit;
    }

    public function setHematocrit(float $hematocrit): self
    {
        $this->hematocrit = $hematocrit;

        return $this;
    }

    public function getHemoglobin(): ?float
    {
        return $this->hemoglobin;
    }

    public function setHemoglobin(float $hemoglobin): self
    {
        $this->hemoglobin = $hemoglobin;

        return $this;
    }

    public function getLeukocytes(): ?float
    {
        return $this->leukocytes;
    }

    public function setLeukocytes(float $leukocytes): self
    {
        $this->leukocytes = $leukocytes;

        return $this;
    }

    public function getPlatelets(): ?float
    {
        return $this->platelets;
    }

    public function setPlatelets(float $platelets): self
    {
        $this->platelets = $platelets;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getRecord(): ?Record
    {
        return $this->record;
    }

    public function setRecord(?Record $record): self
    {
        $this->record = $record;

        // set (or unset) the owning side of the relation if necessary
        $newHematicBiometry = null === $record ? null : $this;
        if ($record->getHematicBiometry() !== $newHematicBiometry) {
            $record->setHematicBiometry($newHematicBiometry);
        }

        return $this;
    }
}
