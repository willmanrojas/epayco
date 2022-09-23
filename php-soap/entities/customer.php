<?php

//namespace soap\entities;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="customer")
 */

class Customer
{
    /**
     * 
     */
    function __construct($document, $fullname, $email, $phone)
    {
        $this->document = $document;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->phone = $phone;
    }


    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="document", type="text", length=10, nullable=false)
     * @var string
     */
    private $document;

    /**
     * @ORM\Column(name="fullname", type="text", length=100, nullable=false)
     * @var string
     */
    private $fullname;

    /**
     * @ORM\Column(name="email", type="text", length=100, nullable=false)
     * @var string
     */
    private $email;

    /**
     * @ORM\Column(name="phone", type="text", length=50, nullable=false)
     * @var string
     */
    private $phone;


    /**
     * @return string
     */
    public function getDocument(): string
    {
        return $this->document;
    }

    /**
     * @param string $document
     */
    public function setDocument(string $document){
        $this->document = $document;
    }

    /**
     * @return string
     */
    public function getFullname(): string
    {
        return $this->fullname;
    }

    /**
     * @param string $fullname
     */
    public function setFullname(string $document){
        $this->document = $document;
    }    
}

