<?php

namespace Hello\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GamesInstall
 *
 * @ORM\Table(name="games_install")
 * @ORM\Entity
 */
class GamesInstall
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
     * @ORM\Column(name="attraction_id", type="integer", nullable=false)
     */
    private $attractionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="client_id", type="integer", nullable=false)
     */
    private $clientId;

    /**
     * @var integer
     *
     * @ORM\Column(name="game_id", type="integer", nullable=false)
     */
    private $gameId;

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
     * Set attractionId
     *
     * @param integer $attractionId
     * @return GamesInstall
     */
    public function setAttractionId($attractionId)
    {
        $this->attractionId = $attractionId;

        return $this;
    }

    /**
     * Get attractionId
     *
     * @return integer 
     */
    public function getAttractionId()
    {
        return $this->attractionId;
    }

    /**
     * Set clientId
     *
     * @param integer $clientId
     * @return GamesInstall
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
     * Set gameId
     *
     * @param integer $gameId
     * @return GamesInstall
     */
    public function setGameId($gameId)
    {
        $this->gameId = $gameId;

        return $this;
    }

    /**
     * Get gameId
     *
     * @return integer 
     */
    public function getGameId()
    {
        return $this->gameId;
    }

    /**
     * Set dateadd
     *
     * @param \DateTime $dateadd
     * @return GamesInstall
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
