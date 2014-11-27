<?php

namespace Secure\AvtorizBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Acme\UserBundle\Entity\User
 *
 * @ORM\Table(name="acme_users")
 * @ORM\Entity(repositoryClass="Secure\AvtorizBundle\Entity\Repositories\UserRepository")
 */
class User implements AdvancedUserInterface, \Serializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    
    /**
     * @ORM\Column(name="full_name", type="string", length=255)
     */
    private $fullName;
    
    

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;
    
    /**
     * @ORM\Column(name="uniq_user_idiff", type="string", length=255, unique=true)
     */
    private $iDiff;
    
    
     /**
     * @ORM\ManyToMany(targetEntity="Role", inversedBy="users")
     *
     */
    private $roles;
    
    /**
     * @ORM\OneToMany(targetEntity="AcmeMail", mappedBy="user")
     **/
    private $listmail;
    
     /**
     * @ORM\OneToMany(targetEntity="AcmeRules", mappedBy="user")
     **/
    private $listrule;

    public function __construct()
    {
       $this -> roles = new ArrayCollection();
       $this -> listmail = new ArrayCollection();
       $this -> listrule = new ArrayCollection();
    }

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getPassword()
    {
        return $this->password;
    }

    
    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return $this->roles->toArray();
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->isActive,
            // see section on salt below
            // $this->salt,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->isActive,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }

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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
    
     public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->isActive;
    }

    /**
     * Set fullName
     *
     * @param string $fullName
     * @return User
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Add roles
     *
     * @param \Secure\AvtorizBundle\Entity\Role $roles
     * @return User
     */
    public function addRole(\Secure\AvtorizBundle\Entity\Role $roles)
    {
        $this->roles[] = $roles;

        return $this;
    }

    /**
     * Remove roles
     *
     * @param \Secure\AvtorizBundle\Entity\Role $roles
     */
    public function removeRole(\Secure\AvtorizBundle\Entity\Role $roles)
    {
        $this->roles->removeElement($roles);
    }

    /**
     * Add listmail
     *
     * @param \Secure\AvtorizBundle\Entity\AcmeMail $listmail
     * @return User
     */
    public function addListmail(\Secure\AvtorizBundle\Entity\AcmeMail $listmail)
    {
        $this->listmail[] = $listmail;

        return $this;
    }

    /**
     * Remove listmail
     *
     * @param \Secure\AvtorizBundle\Entity\AcmeMail $listmail
     */
    public function removeListmail(\Secure\AvtorizBundle\Entity\AcmeMail $listmail)
    {
        $this->listmail->removeElement($listmail);
    }

    /**
     * Get listmail
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getListmail()
    {
         foreach ( $this->listmail as $key => $value  ){
             $arrMail[$key]=$value -> getMail();
        }
        return $arrMail;
        //return $this->listmail -> toArray();
    }

    /**
     * Add listrule
     *
     * @param \Secure\AvtorizBundle\Entity\AcmeRules $listrule
     * @return User
     */
    public function addListrule(\Secure\AvtorizBundle\Entity\AcmeRules $listrule)
    {
        $this->listrule[] = $listrule;

        return $this;
    }

    /**
     * Remove listrule
     *
     * @param \Secure\AvtorizBundle\Entity\AcmeRules $listrule
     */
    public function removeListrule(\Secure\AvtorizBundle\Entity\AcmeRules $listrule)
    {
        $this->listrule->removeElement($listrule);
    }

    /**
     * Get listrule
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getListrule()
    {
        foreach ( $this->listrule as $key => $value  ){
             $arrRules['myMail']=$value -> getMymail();
             $arrRules['myFile']=$value -> getMyfile();
             $arrRules['allMail']=$value -> getAllmail();
             $arrRules['allFile']=$value -> getAllfile();
        }
       if  ( isset($arrRules) ) { return $arrRules;} else {  return false; }
    }

    /**
     * Set iDiff
     *
     * @param string $iDiff
     * @return User
     */
    public function setIDiff($iDiff)
    {
        $this->iDiff = $iDiff;

        return $this;
    }

    /**
     * Get iDiff
     *
     * @return string 
     */
    public function getIDiff()
    {
        return $this->iDiff;
    }
}
