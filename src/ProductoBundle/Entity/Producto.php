<?php

namespace ProductoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use ecommarg\cart\ProductInterface;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Producto
 *
 * @ORM\Table(name="producto")
 * @ORM\Entity(repositoryClass="ProductoBundle\Repository\ProductoRepository")
 */
class Producto implements ProductInterface
{
    /**
    *@ORM\ManyToMany(targetEntity="Category", inversedBy="Products")
    *@ORM\JoinTable(name="Product_category")
    */
    private $categories=null;
    public function __construct()
    {
        $this->categories=new ArrayCollection();
    }
    public function getCategories()
    {
        return $this->categories;
    }
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
      * @Assert\NotBlank
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
      * @Assert\NotBlank
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer")
      * @Assert\NotBlank
     */
    private $stock;


    /**
     * Get id
     *
     * @return int
     */
    public function jsonSerialize()
    {
        return [
                    'id'=>$this->getId(),
                    'name'=>$this->getName(),
                    'price'=>$this->getPrice(),
                    'stock'=>$this->getStock()
        ];
    }
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Producto
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Producto
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     *
     * @return Producto
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return int
     */
    public function getStock()
    {
        return $this->stock;
    }
    public function __toString()
    {
        return $this->name;
    }
}

