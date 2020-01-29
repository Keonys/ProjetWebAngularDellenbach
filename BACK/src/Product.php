<?php
// src/Product.php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */
class Product
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
	
    /** 
     * @ORM\Column(type="string") 
     */
    protected $name;
	
	/** 
     * @ORM\Column(type="string") 
     */
    protected $description;
	
	/** 
     * @ORM\Column(type="integer") 
     */
    protected $prix;
	
	/** 
     * @ORM\Column(type="string") 
     */
    protected $image;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
	
	public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
	
	public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
    }
	
	public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }
	
	
	public function getJson(){
		return $this->getImage();
	}
}
?>