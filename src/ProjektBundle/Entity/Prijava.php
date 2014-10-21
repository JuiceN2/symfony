<?php

namespace Jan\ProjektBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prijava
 */
class Prijava
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $ime;

    /**
     * @var string
     */
    private $priimek;

    /**
     * @var string
     */
    private $naslov;

    /**
     * @var string
     */
    private $enaslov;

    /**
     * @var string
     */
    private $telefon;

    /**
     * @var \DateTime
     */
    private $datumrojstva;

    /**
     * @var \DateTime
     */
    private $datumdodajanja;

    /**
     * @var string
     */
    private $hobiji;

    /**
     * @var string
     */
    private $profesionalnazgodovina;

    /**
     * @var string
     */
    private $linkedinprofil;

    /**
     * @var string
     */
    private $linkdocv;


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
     * Set ime
     *
     * @param string $ime
     * @return Prijava
     */
    public function setIme($ime)
    {
        $this->ime = $ime;

        return $this;
    }

    /**
     * Get ime
     *
     * @return string 
     */
    public function getIme()
    {
        return $this->ime;
    }

    /**
     * Set priimek
     *
     * @param string $priimek
     * @return Prijava
     */
    public function setPriimek($priimek)
    {
        $this->priimek = $priimek;

        return $this;
    }

    /**
     * Get priimek
     *
     * @return string 
     */
    public function getPriimek()
    {
        return $this->priimek;
    }

    /**
     * Set naslov
     *
     * @param string $naslov
     * @return Prijava
     */
    public function setNaslov($naslov)
    {
        $this->naslov = $naslov;

        return $this;
    }

    /**
     * Get naslov
     *
     * @return string 
     */
    public function getNaslov()
    {
        return $this->naslov;
    }

    /**
     * Set enaslov
     *
     * @param string $enaslov
     * @return Prijava
     */
    public function setEnaslov($enaslov)
    {
        $this->enaslov = $enaslov;

        return $this;
    }

    /**
     * Get enaslov
     *
     * @return string 
     */
    public function getEnaslov()
    {
        return $this->enaslov;
    }

    /**
     * Set telefon
     *
     * @param string $telefon
     * @return Prijava
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;

        return $this;
    }

    /**
     * Get telefon
     *
     * @return string 
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * Set datumrojstva
     *
     * @param \DateTime $datumrojstva
     * @return Prijava
     */
    public function setDatumrojstva($datumrojstva)
    {
        $this->datumrojstva = $datumrojstva;

        return $this;
    }

    /**
     * Get datumrojstva
     *
     * @return \DateTime 
     */
    public function getDatumrojstva()
    {
        return $this->datumrojstva;
    }

    /**
     * Set datumdodajanja
     *
     * @param \DateTime $datumdodajanja
     * @return Prijava
     */
    public function setDatumdodajanja($datumdodajanja)
    {
        $this->datumdodajanja = $datumdodajanja;

        return $this;
    }

    /**
     * Get datumdodajanja
     *
     * @return \DateTime 
     */
    public function getDatumdodajanja()
    {
        return $this->datumdodajanja;
    }

    /**
     * Set hobiji
     *
     * @param string $hobiji
     * @return Prijava
     */
    public function setHobiji($hobiji)
    {
        $this->hobiji = $hobiji;

        return $this;
    }

    /**
     * Get hobiji
     *
     * @return string 
     */
    public function getHobiji()
    {
        return $this->hobiji;
    }

    /**
     * Set profesionalnazgodovina
     *
     * @param string $profesionalnazgodovina
     * @return Prijava
     */
    public function setProfesionalnazgodovina($profesionalnazgodovina)
    {
        $this->profesionalnazgodovina = $profesionalnazgodovina;

        return $this;
    }

    /**
     * Get profesionalnazgodovina
     *
     * @return string 
     */
    public function getProfesionalnazgodovina()
    {
        return $this->profesionalnazgodovina;
    }

    /**
     * Set linkedinprofil
     *
     * @param string $linkedinprofil
     * @return Prijava
     */
    public function setLinkedinprofil($linkedinprofil)
    {
        $this->linkedinprofil = $linkedinprofil;

        return $this;
    }

    /**
     * Get linkedinprofil
     *
     * @return string 
     */
    public function getLinkedinprofil()
    {
        return $this->linkedinprofil;
    }

    /**
     * Set linkdocv
     *
     * @param string $linkdocv
     * @return Prijava
     */
    public function setLinkdocv($linkdocv)
    {
        $this->linkdocv = $linkdocv;

        return $this;
    }

    /**
     * Get linkdocv
     *
     * @return string 
     */
    public function getLinkdocv()
    {
        return $this->linkdocv;
    }
}
