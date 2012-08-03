<?php

namespace Piotr\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Product
{

	/**
	 * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
	 * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
	 */
	protected $category;

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string", length=80) 
	 */
	protected $name;

	/**
	 * @ORM\Column(type="decimal", scale=2)
	 */
	protected $price;

	/**
	 * @ORM\Column(type="string", length=200) 
	 */
	protected $description;

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
	 * Set price
	 *
	 * @param decimal $price
	 */
	public function setPrice($price)
	{
		$this->price = $price;
	}

	/**
	 * Get price
	 *
	 * @return decimal 
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * Set description
	 *
	 * @param string $description
	 */
	public function setDescription($description)
	{
		$this->description = $description;
	}

	/**
	 * Get description
	 *
	 * @return string 
	 */
	public function getDescription()
	{
		return $this->description;
	}


    /**
     * Set category
     *
     * @param Piotr\HelloBundle\Entity\Category $category
     */
    public function setCategory(\Piotr\HelloBundle\Entity\Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return Piotr\HelloBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}