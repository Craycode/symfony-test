<?php

namespace Piotr\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Piotr\HelloBundle\Entity\Category
 *
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(name="unique_name", columns={"name"})})
 * @ORM\Entity
 */
class Category
{
	
	/**
	 * @ORM\OneToMany(targetEntity="Product", mappedBy="category") 
	 */
	protected $products;
	
	public function __construct($name = null)
	{
		$this->products = new ArrayCollection();
		$this->setName($name);
	}
	
	/**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Add products
     *
     * @param Piotr\HelloBundle\Entity\Product $products
     */
    public function addProduct(\Piotr\HelloBundle\Entity\Product $products)
    {
        $this->products[] = $products;
    }

    /**
     * Get products
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }
}