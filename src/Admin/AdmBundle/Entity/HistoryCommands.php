<?php

namespace Admin\AdmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HistoryCommands
 *
 * @ORM\Table(name="history_commands")
 * @ORM\Entity
 
 * @ORM\Table(name="history_commands", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity(repositoryClass="Admin\AdmBundle\Entity\Repositories\HistoryCommandsRepository")
 */
class HistoryCommands
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
     * @var boolean
     *
     * @ORM\Column(name="type_cmd", type="boolean", nullable=false)
     */
    private $typeCmd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="add_cmd", type="datetime", nullable=false)
     */
    private $addCmd = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startexec", type="datetime", nullable=false)
     */
    private $startexec = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endexec", type="datetime", nullable=false)
     */
    private $endexec = '0000-00-00 00:00:00';

    /**
     * @var boolean
     *
     * @ORM\Column(name="progress", type="boolean", nullable=false)
     */
    private $progress;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;



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
     * @return HistoryCommands
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
     * @return HistoryCommands
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
     * @return HistoryCommands
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
     * Set typeCmd
     *
     * @param boolean $typeCmd
     * @return HistoryCommands
     */
    public function setTypeCmd($typeCmd)
    {
        $this->typeCmd = $typeCmd;

        return $this;
    }

    /**
     * Get typeCmd
     *
     * @return boolean 
     */
    public function getTypeCmd()
    {
        return $this->typeCmd;
    }

    /**
     * Set addCmd
     *
     * @param \DateTime $addCmd
     * @return HistoryCommands
     */
    public function setAddCmd($addCmd)
    {
        $this->addCmd = $addCmd;

        return $this;
    }

    /**
     * Get addCmd
     *
     * @return \DateTime 
     */
    public function getAddCmd()
    {
        return $this->addCmd;
    }

    /**
     * Set startexec
     *
     * @param \DateTime $startexec
     * @return HistoryCommands
     */
    public function setStartexec($startexec)
    {
        $this->startexec = $startexec;

        return $this;
    }

    /**
     * Get startexec
     *
     * @return \DateTime 
     */
    public function getStartexec()
    {
        return $this->startexec;
    }

    /**
     * Set endexec
     *
     * @param \DateTime $endexec
     * @return HistoryCommands
     */
    public function setEndexec($endexec)
    {
        $this->endexec = $endexec;

        return $this;
    }

    /**
     * Get endexec
     *
     * @return \DateTime 
     */
    public function getEndexec()
    {
        return $this->endexec;
    }

    /**
     * Set progress
     *
     * @param boolean $progress
     * @return HistoryCommands
     */
    public function setProgress($progress)
    {
        $this->progress = $progress;

        return $this;
    }

    /**
     * Get progress
     *
     * @return boolean 
     */
    public function getProgress()
    {
        return $this->progress;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return HistoryCommands
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }
}
