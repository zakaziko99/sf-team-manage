<?php

namespace TeamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Member
 *
 * @ORM\Table(name="member")
 * @ORM\Entity(repositoryClass="TeamBundle\Repository\MemberRepository")
 */
class Member
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=100)
     */
    private $role;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="member_at", type="datetime")
     */
    private $memberAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active = false;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="MembersDiplomes", mappedBy="member")
     */
    private $diplomes;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Member
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
     * Set role
     *
     * @param string $role
     *
     * @return Member
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set memberAt
     *
     * @param \DateTime $memberAt
     *
     * @return Member
     */
    public function setMemberAt($memberAt)
    {
        $this->memberAt = $memberAt;

        return $this;
    }

    /**
     * Get memberAt
     *
     * @return \DateTime
     */
    public function getMemberAt()
    {
        return $this->memberAt;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Member
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->diplomes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add diplome
     *
     * @param \TeamBundle\Entity\Diplome $diplome
     *
     * @return Member
     */
    public function addDiplome(\TeamBundle\Entity\Diplome $diplome)
    {
        $this->diplomes[] = $diplome;

        return $this;
    }

    /**
     * Remove diplome
     *
     * @param \TeamBundle\Entity\Diplome $diplome
     */
    public function removeDiplome(\TeamBundle\Entity\Diplome $diplome)
    {
        $this->diplomes->removeElement($diplome);
    }

    /**
     * Get diplomes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDiplomes()
    {
        return $this->diplomes;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
