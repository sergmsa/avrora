<?php

namespace Secure\AvtorizBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CallUsers
 *
 * @ORM\Table(name="call_users", indexes={@ORM\Index(name="long", columns={"long_call"})})
 * @ORM\Entity
 */
class CallUsers
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
     * @var string
     *
     * @ORM\Column(name="from_user", type="string", length=256, nullable=false)
     */
    private $fromUser;

    /**
     * @var string
     *
     * @ORM\Column(name="to_user", type="string", length=256, nullable=false)
     */
    private $toUser;

    /**
     * @var string
     *
     * @ORM\Column(name="beetwen", type="string", length=256, nullable=false)
     */
    private $beetwen;

    /**
     * @var string
     *
     * @ORM\Column(name="mp3_path", type="string", length=256, nullable=false)
     */
    private $mp3Path;

    /**
     * @var string
     *
     * @ORM\Column(name="ms_id", type="string", length=256, nullable=false)
     */
    private $msId;

    /**
     * @var string
     *
     * @ORM\Column(name="uidl", type="string", length=256, nullable=false)
     */
    private $uidl;

    /**
     * @var integer
     *
     * @ORM\Column(name="from_user_id", type="integer", nullable=true)
     */
    private $fromUserId;

    /**
     * @var integer
     *
     * @ORM\Column(name="to_user_id", type="integer", nullable=true)
     */
    private $toUserId;

    /**
     * @var integer
     *
     * @ORM\Column(name="from_tt_id", type="integer", nullable=true)
     */
    private $fromTtId;

    /**
     * @var integer
     *
     * @ORM\Column(name="to_tt_id", type="integer", nullable=true)
     */
    private $toTtId;

    /**
     * @var integer
     *
     * @ORM\Column(name="from_dealer_id", type="integer", nullable=true)
     */
    private $fromDealerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="to_dealer_id", type="integer", nullable=true)
     */
    private $toDealerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="from_clorg_id", type="integer", nullable=true)
     */
    private $fromClorgId;

    /**
     * @var integer
     *
     * @ORM\Column(name="to_clorg_id", type="integer", nullable=true)
     */
    private $toClorgId;

    /**
     * @var string
     *
     * @ORM\Column(name="from_user_name", type="string", length=256, nullable=true)
     */
    private $fromUserName;

    /**
     * @var string
     *
     * @ORM\Column(name="to_user_name", type="string", length=255, nullable=true)
     */
    private $toUserName;

    /**
     * @var \ListMessages
     *
     * @ORM\ManyToOne(targetEntity="ListMessages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="long_call", referencedColumnName="user_name")
     * })
     */
    private $longCall;



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
     * Set fromUser
     *
     * @param string $fromUser
     * @return CallUsers
     */
    public function setFromUser($fromUser)
    {
        $this->fromUser = $fromUser;

        return $this;
    }

    /**
     * Get fromUser
     *
     * @return string 
     */
    public function getFromUser()
    {
        return $this->fromUser;
    }

    /**
     * Set toUser
     *
     * @param string $toUser
     * @return CallUsers
     */
    public function setToUser($toUser)
    {
        $this->toUser = $toUser;

        return $this;
    }

    /**
     * Get toUser
     *
     * @return string 
     */
    public function getToUser()
    {
        return $this->toUser;
    }

    /**
     * Set beetwen
     *
     * @param string $beetwen
     * @return CallUsers
     */
    public function setBeetwen($beetwen)
    {
        $this->beetwen = $beetwen;

        return $this;
    }

    /**
     * Get beetwen
     *
     * @return string 
     */
    public function getBeetwen()
    {
        return $this->beetwen;
    }

    /**
     * Set mp3Path
     *
     * @param string $mp3Path
     * @return CallUsers
     */
    public function setMp3Path($mp3Path)
    {
        $this->mp3Path = $mp3Path;

        return $this;
    }

    /**
     * Get mp3Path
     *
     * @return string 
     */
    public function getMp3Path()
    {
        return $this->mp3Path;
    }

    /**
     * Set msId
     *
     * @param string $msId
     * @return CallUsers
     */
    public function setMsId($msId)
    {
        $this->msId = $msId;

        return $this;
    }

    /**
     * Get msId
     *
     * @return string 
     */
    public function getMsId()
    {
        return $this->msId;
    }

    /**
     * Set uidl
     *
     * @param string $uidl
     * @return CallUsers
     */
    public function setUidl($uidl)
    {
        $this->uidl = $uidl;

        return $this;
    }

    /**
     * Get uidl
     *
     * @return string 
     */
    public function getUidl()
    {
        return $this->uidl;
    }

    /**
     * Set fromUserId
     *
     * @param integer $fromUserId
     * @return CallUsers
     */
    public function setFromUserId($fromUserId)
    {
        $this->fromUserId = $fromUserId;

        return $this;
    }

    /**
     * Get fromUserId
     *
     * @return integer 
     */
    public function getFromUserId()
    {
        return $this->fromUserId;
    }

    /**
     * Set toUserId
     *
     * @param integer $toUserId
     * @return CallUsers
     */
    public function setToUserId($toUserId)
    {
        $this->toUserId = $toUserId;

        return $this;
    }

    /**
     * Get toUserId
     *
     * @return integer 
     */
    public function getToUserId()
    {
        return $this->toUserId;
    }

    /**
     * Set fromTtId
     *
     * @param integer $fromTtId
     * @return CallUsers
     */
    public function setFromTtId($fromTtId)
    {
        $this->fromTtId = $fromTtId;

        return $this;
    }

    /**
     * Get fromTtId
     *
     * @return integer 
     */
    public function getFromTtId()
    {
        return $this->fromTtId;
    }

    /**
     * Set toTtId
     *
     * @param integer $toTtId
     * @return CallUsers
     */
    public function setToTtId($toTtId)
    {
        $this->toTtId = $toTtId;

        return $this;
    }

    /**
     * Get toTtId
     *
     * @return integer 
     */
    public function getToTtId()
    {
        return $this->toTtId;
    }

    /**
     * Set fromDealerId
     *
     * @param integer $fromDealerId
     * @return CallUsers
     */
    public function setFromDealerId($fromDealerId)
    {
        $this->fromDealerId = $fromDealerId;

        return $this;
    }

    /**
     * Get fromDealerId
     *
     * @return integer 
     */
    public function getFromDealerId()
    {
        return $this->fromDealerId;
    }

    /**
     * Set toDealerId
     *
     * @param integer $toDealerId
     * @return CallUsers
     */
    public function setToDealerId($toDealerId)
    {
        $this->toDealerId = $toDealerId;

        return $this;
    }

    /**
     * Get toDealerId
     *
     * @return integer 
     */
    public function getToDealerId()
    {
        return $this->toDealerId;
    }

    /**
     * Set fromClorgId
     *
     * @param integer $fromClorgId
     * @return CallUsers
     */
    public function setFromClorgId($fromClorgId)
    {
        $this->fromClorgId = $fromClorgId;

        return $this;
    }

    /**
     * Get fromClorgId
     *
     * @return integer 
     */
    public function getFromClorgId()
    {
        return $this->fromClorgId;
    }

    /**
     * Set toClorgId
     *
     * @param integer $toClorgId
     * @return CallUsers
     */
    public function setToClorgId($toClorgId)
    {
        $this->toClorgId = $toClorgId;

        return $this;
    }

    /**
     * Get toClorgId
     *
     * @return integer 
     */
    public function getToClorgId()
    {
        return $this->toClorgId;
    }

    /**
     * Set fromUserName
     *
     * @param string $fromUserName
     * @return CallUsers
     */
    public function setFromUserName($fromUserName)
    {
        $this->fromUserName = $fromUserName;

        return $this;
    }

    /**
     * Get fromUserName
     *
     * @return string 
     */
    public function getFromUserName()
    {
        return $this->fromUserName;
    }

    /**
     * Set toUserName
     *
     * @param string $toUserName
     * @return CallUsers
     */
    public function setToUserName($toUserName)
    {
        $this->toUserName = $toUserName;

        return $this;
    }

    /**
     * Get toUserName
     *
     * @return string 
     */
    public function getToUserName()
    {
        return $this->toUserName;
    }

    /**
     * Set longCall
     *
     * @param \Secure\AvtorizBundle\Entity\ListMessages $longCall
     * @return CallUsers
     */
    public function setLongCall(\Secure\AvtorizBundle\Entity\ListMessages $longCall = null)
    {
        $this->longCall = $longCall;

        return $this;
    }

    /**
     * Get longCall
     *
     * @return \Secure\AvtorizBundle\Entity\ListMessages 
     */
    public function getLongCall()
    {
        return $this->longCall;
    }
}
