<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="orders")
     */
    private $customerid;

    /**
     * @ORM\Column(type="datetime")
     */
    private $orderdatetime;

    /**
     * @ORM\Column(type="boolean")
     */
    private $payed;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OrderDetail", mappedBy="orderid")
     */
    private $orderDetails;

    public function __construct()
    {
        $this->orderDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomerid(): ?User
    {
        return $this->customerid;
    }

    public function setCustomerid(?User $customerid): self
    {
        $this->customerid = $customerid;

        return $this;
    }

    public function getOrderdatetime(): ?\DateTimeInterface
    {
        return $this->orderdatetime;
    }

    public function setOrderdatetime(\DateTimeInterface $orderdatetime): self
    {
        $this->orderdatetime = $orderdatetime;

        return $this;
    }

    public function getPayed(): ?bool
    {
        return $this->payed;
    }

    public function setPayed(bool $payed): self
    {
        $this->payed = $payed;

        return $this;
    }

    /**
     * @return Collection|OrderDetail[]
     */
    public function getOrderDetails(): Collection
    {
        return $this->orderDetails;
    }

    public function addOrderDetail(OrderDetail $orderDetail): self
    {
        if (!$this->orderDetails->contains($orderDetail)) {
            $this->orderDetails[] = $orderDetail;
            $orderDetail->setOrderid($this);
        }

        return $this;
    }

    public function removeOrderDetail(OrderDetail $orderDetail): self
    {
        if ($this->orderDetails->contains($orderDetail)) {
            $this->orderDetails->removeElement($orderDetail);
            // set the owning side to null (unless already changed)
            if ($orderDetail->getOrderid() === $this) {
                $orderDetail->setOrderid(null);
            }
        }

        return $this;
    }
}
