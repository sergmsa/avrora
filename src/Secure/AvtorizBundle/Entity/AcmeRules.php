<?php

namespace Secure\AvtorizBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AcmeRules
 *
 * @ORM\Table(name="acme_rules", indexes={@ORM\Index(name="USER_ID_FOR_RULES", columns={"user_id"})})
 * @ORM\Entity
 */
class AcmeRules
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
     * @ORM\Column(name="myMail", type="integer", nullable=false)
     */
    private $mymail = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="myFile", type="integer", nullable=false)
     */
    private $myfile = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="allMail", type="integer", nullable=false)
     */
    private $allmail = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="allFile", type="integer", nullable=false)
     */
    private $allfile = '0';

    /**
     * @var \AcmeUsers
     *
     * @ORM\OneToOne(targetEntity="AcmeUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



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
     * Set mymail
     *
     * @param integer $mymail
     * @return AcmeRules
     */
    public function setMymail($mymail)
    {
        $this->mymail = $mymail;

        return $this;
    }

    /**
     * Get mymail
     *
     * @return integer 
     */
    public function getMymail()
    {
        return $this->mymail;
    }

    /**
     * Set myfile
     *
     * @param integer $myfile
     * @return AcmeRules
     */
    public function setMyfile($myfile)
    {
        $this->myfile = $myfile;

        return $this;
    }

    /**
     * Get myfile
     *
     * @return integer 
     */
    public function getMyfile()
    {
        return $this->myfile;
    }

    /**
     * Set allmail
     *
     * @param integer $allmail
     * @return AcmeRules
     */
    public function setAllmail($allmail)
    {
        $this->allmail = $allmail;

        return $this;
    }

    /**
     * Get allmail
     *
     * @return integer 
     */
    public function getAllmail()
    {
        return $this->allmail;
    }

    /**
     * Set allfile
     *
     * @param integer $allfile
     * @return AcmeRules
     */
    public function setAllfile($allfile)
    {
        $this->allfile = $allfile;

        return $this;
    }

    /**
     * Get allfile
     *
     * @return integer 
     */
    public function getAllfile()
    {
        return $this->allfile;
    }

    /**
     * Set user
     *
     * @param \Secure\AvtorizBundle\Entity\AcmeUsers $user
     * @return AcmeRules
     */
    public function setUser(\Secure\AvtorizBundle\Entity\AcmeUsers $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Secure\AvtorizBundle\Entity\AcmeUsers 
     */
    public function getUser()
    {
        return $this->user;
    }
}
