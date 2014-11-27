<?php

namespace Secure\AvtorizBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AcmeMail
 *
 * @ORM\Table(name="acme_mail", uniqueConstraints={@ORM\UniqueConstraint(name="USER_MAIL", columns={"mail"})}, indexes={@ORM\Index(name="USER_ID", columns={"user_id"})})
 * @ORM\Entity
 */
class AcmeMail
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
     * @ORM\Column(name="mail", type="string", length=255, nullable=false)
     */
    private $mail;

    /**
     * @var \AcmeUsers
     *
     * @ORM\ManyToOne(targetEntity="User")
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
     * Set mail
     *
     * @param string $mail
     * @return AcmeMail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set user
     *
     * @param \Secure\AvtorizBundle\Entity\AcmeUsers $user
     * @return AcmeMail
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
