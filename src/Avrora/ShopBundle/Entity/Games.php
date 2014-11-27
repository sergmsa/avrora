<?php

namespace Avrora\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Games
 *
 * @ORM\Table(name="games")
 * @ORM\Entity
 
 * @ORM\Table(name="games", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity(repositoryClass="Avrora\ShopBundle\Entity\Repositories\GamesRepository")
 
 */
class Games
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
     * @ORM\Column(name="developer_id", type="integer", nullable=false)
     */
    private $developerId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="ver", type="string", length=10, nullable=false)
     */
    private $ver;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=5, scale=2, nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="path_run", type="string", length=256, nullable=false)
     */
    private $pathRun;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateadd", type="datetime", nullable=false)
     */
    private $dateadd = 'CURRENT_TIMESTAMP';



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
     * Set developerId
     *
     * @param integer $developerId
     * @return Games
     */
    public function setDeveloperId($developerId)
    {
        $this->developerId = $developerId;

        return $this;
    }

    /**
     * Get developerId
     *
     * @return integer 
     */
    public function getDeveloperId()
    {
        return $this->developerId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Games
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
     * Set ver
     *
     * @param string $ver
     * @return Games
     */
    public function setVer($ver)
    {
        $this->ver = $ver;

        return $this;
    }

    /**
     * Get ver
     *
     * @return string 
     */
    public function getVer()
    {
        return $this->ver;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Games
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
     * Set pathRun
     *
     * @param string $pathRun
     * @return Games
     */
    public function setPathRun($pathRun)
    {
        $this->pathRun = $pathRun;

        return $this;
    }

    /**
     * Get pathRun
     *
     * @return string 
     */
    public function getPathRun()
    {
        return $this->pathRun;
    }

    /**
     * Set dateadd
     *
     * @param \DateTime $dateadd
     * @return Games
     */
    public function setDateadd($dateadd)
    {
        $this->dateadd = $dateadd;

        return $this;
    }

    /**
     * Get dateadd
     *
     * @return \DateTime 
     */
    public function getDateadd()
    {
        return $this->dateadd;
    }
}
