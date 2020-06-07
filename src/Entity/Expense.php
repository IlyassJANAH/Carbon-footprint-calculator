<?php

namespace App\Entity;

use App\Repository\ExpenseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExpenseRepository::class)
 */
class Expense
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="text")
     */
    private $ExpenseType;

    /**
     * @ORM\Column(type="float")
     */
    private $Ratio;

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getExpenseType(): ?string
    {
        return $this->ExpenseType;
    }

    public function setExpenseType(string $ExpenseType): self
    {
        $this->ExpenseType = $ExpenseType;

        return $this;
    }

    public function getRatio(): ?float
    {
        return $this->Ratio;
    }

    public function setRatio(float $Ratio): self
    {
        $this->Ratio = $Ratio;

        return $this;
    }
}
