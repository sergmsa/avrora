<?php

namespace Hello\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attractions
 *
 * @ORM\Table(name="attractions")
 * @ORM\Entity
 */
class Attractions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="client_id", type="integer", nullable=false)
     */
    private $clientId;

    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=32, nullable=false)
     */
    private $pass;

    /**
     * @var string
     *
     * @ORM\Column(name="gpsn", type="string", length=10, nullable=false)
     */
    private $gpsn;

    /**
     * @var string
     *
     * @ORM\Column(name="gpse", type="string", length=10, nullable=false)
     */
    private $gpse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateinstall", type="date", nullable=false)
     */
    private $dateinstall;



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
     * Set clientId
     *
     * @param integer $clientId
     * @return Attractions
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId
     *
     * @return integer 
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set pass
     *
     * @param string $pass
     * @return Attractions
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass
     *
     * @return string 
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set gpsn
     *
     * @param string $gpsn
     * @return Attractions
     */
    public function setGpsn($gpsn)
    {
        $this->gpsn = $gpsn;

        return $this;
    }

    /**
     * Get gpsn
     *
     * @return string 
     */
    public function getGpsn()
    {
        return $this->gpsn;
    }

    /**
     * Set gpse
     *
     * @param string $gpse
     * @return Attractions
     */
    public function setGpse($gpse)
    {
        $this->gpse = $gpse;

        return $this;
    }

    /**
     * Get gpse
     *
     * @return string 
     */
    public function getGpse()
    {
        return $this->gpse;
    }

    /**
     * Set dateinstall
     *
     * @param \DateTime $dateinstall
     * @return Attractions
     */
    public function setDateinstall($dateinstall)
    {
        $this->dateinstall = $dateinstall;

        return $this;
    }

    /**
     * Get dateinstall
     *
     * @return \DateTime 
     */
    public function getDateinstall()
    {
        return $this->dateinstall;
    }
}
