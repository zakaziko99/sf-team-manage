<?php

namespace TeamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MembersDiplomes
 *
 * @ORM\Table(name="members_diplomes")
 * @ORM\Entity(repositoryClass="TeamBundle\Repository\MembersDiplomesRepository")
 */
class MembersDiplomes
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
     * @ORM\Column(name="titre", type="string", length=100)
     */
    private $titre;

    /**
     * @var int
     *
     * @ORM\Column(name="year", type="integer")
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="mention", type="string", length=50)
     */
    private $mention;

    /**
     * @var Diplome
     *
     * @ORM\ManyToOne(targetEntity="Diplome", inversedBy="members")
     * @ORM\JoinColumn(name="id_diplome", referencedColumnName="id")
     */
    private $diplome;

    /**
     * @var Member
     *
     * @ORM\ManyToOne(targetEntity="Member", inversedBy="diplomes")
     * @ORM\JoinColumn(name="id_member", referencedColumnName="id")
     */
    private $member;


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
     * Set year
     *
     * @param integer $year
     *
     * @return MembersDiplomes
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set mention
     *
     * @param string $mention
     *
     * @return MembersDiplomes
     */
    public function setMention($mention)
    {
        $this->mention = $mention;

        return $this;
    }

    /**
     * Get mention
     *
     * @return string
     */
    public function getMention()
    {
        return $this->mention;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return MembersDiplomes
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set diplome
     *
     * @param \TeamBundle\Entity\Diplome $diplome
     *
     * @return MembersDiplomes
     */
    public function setDiplome(\TeamBundle\Entity\Diplome $diplome = null)
    {
        $this->diplome = $diplome;

        return $this;
    }

    /**
     * Get diplome
     *
     * @return \TeamBundle\Entity\Diplome
     */
    public function getDiplome()
    {
        return $this->diplome;
    }

    /**
     * Set member
     *
     * @param \TeamBundle\Entity\Member $member
     *
     * @return MembersDiplomes
     */
    public function setMember(\TeamBundle\Entity\Member $member = null)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * Get member
     *
     * @return \TeamBundle\Entity\Member
     */
    public function getMember()
    {
        return $this->member;
    }
}
