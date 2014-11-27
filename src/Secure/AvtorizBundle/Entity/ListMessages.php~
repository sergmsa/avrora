<?php

namespace Secure\AvtorizBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListMessages
 *
 * @ORM\Table(name="list_messages", indexes={@ORM\Index(name="user_name", columns={"user_name"})})
 * @ORM\Entity
 */
class ListMessages
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_d", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idD;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_name", type="integer", nullable=true)
     */
    private $userName;



    /**
     * Get idD
     *
     * @return integer 
     */
    public function getIdD()
    {
        return $this->idD;
    }

    /**
     * Set userName
     *
     * @param integer $userName
     * @return ListMessages
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return integer 
     */
    public function getUserName()
    {
        return $this->userName;
    }
}
