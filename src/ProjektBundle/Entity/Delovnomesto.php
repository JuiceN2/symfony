<?php

namespace Jan\ProjektBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Delovnomesto
 */
class Delovnomesto
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $naziv;

    /**
     * @var string
     */
    private $opis;

    /**
     * @var string
     */
    private $zahteve;

    /**
     * @var string
     */
    private $kajnudimo;

    /**
     * @var \DateTime
     */
    private $datumveljavnosti;

    /**
     * @var \DateTime
     */
    private $datumdodajanja;

    /**
     * @var boolean
     */
    private $nujno;


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
     * Set naziv
     *
     * @param string $naziv
     * @return Delovnomesto
     */
    public function setNaziv($naziv)
    {
        $this->naziv = $naziv;

        return $this;
    }

    /**
     * Get naziv
     *
     * @return string 
     */
    public function getNaziv()
    {
        return $this->naziv;
    }

    /**
     * Set opis
     *
     * @param string $opis
     * @return Delovnomesto
     */
    public function setOpis($opis)
    {
        $this->opis = $opis;

        return $this;
    }

    /**
     * Get opis
     *
     * @return string 
     */
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * Set zahteve
     *
     * @param string $zahteve
     * @return Delovnomesto
     */
    public function setZahteve($zahteve)
    {
        $this->zahteve = $zahteve;

        return $this;
    }

    /**
     * Get zahteve
     *
     * @return string 
     */
    public function getZahteve()
    {
        return $this->zahteve;
    }

    /**
     * Set kajnudimo
     *
     * @param string $kajnudimo
     * @return Delovnomesto
     */
    public function setKajnudimo($kajnudimo)
    {
        $this->kajnudimo = $kajnudimo;

        return $this;
    }

    /**
     * Get kajnudimo
     *
     * @return string 
     */
    public function getKajnudimo()
    {
        return $this->kajnudimo;
    }

    /**
     * Set datumveljavnosti
     *
     * @param \DateTime $datumveljavnosti
     * @return Delovnomesto
     */
    public function setDatumveljavnosti($datumveljavnosti)
    {
        $this->datumveljavnosti = $datumveljavnosti;

        return $this;
    }

    /**
     * Get datumveljavnosti
     *
     * @return \DateTime 
     */
    public function getDatumveljavnosti()
    {
        return $this->datumveljavnosti;
    }

    /**
     * Set datumdodajanja
     *
     * @param \DateTime $datumdodajanja
     * @return Delovnomesto
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
     * Set nujno
     *
     * @param boolean $nujno
     * @return Delovnomesto
     */
    public function setNujno($nujno)
    {
        $this->nujno = $nujno;

        return $this;
    }

    /**
     * Get nujno
     *
     * @return boolean 
     */
    public function getNujno()
    {
        return $this->nujno;
    }
}
