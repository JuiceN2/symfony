<?php

namespace Jan\ProjektBundle\Controller;


use Jan\ProjektBundle\Entity\Delovnomesto;
use Jan\ProjektBundle\Entity\Prijava;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

class DefaultController extends Controller
{
  public function indexAction($name){
  //return $this->render('JanProjektBundle:Default:index.html.twig', array('name' => $name));
  return $this->redirect($this->generateUrl('jan_projekt_prva'));
   
 }

  public function pokaziAction($id){
	$Delovnomesto=$this->getDoctrine()
			   ->getRepository('JanProjektBundle:Delovnomesto')
			   ->find($id);
	if(!$Delovnomesto){
	 throw $this->createNotFoundException('Ni delovnega mesta, ki ima ID '.$id);
  }
	$build['Delovnomesto_item']=$Delovnomesto;
	return $this->render('JanProjektBundle:Default:Delovnomesto_pokazi.html.twig', $build);
  }

  public function pokazi_seznamAction(){
	$Delovnomesto=$this->getDoctrine()
			   ->getRepository('JanProjektBundle:Delovnomesto')
			   ->findBy(array(),array('datumdodajanja'=>'desc'));

	if(!$Delovnomesto){
	 throw $this->createNotFoundException('Ni  prostih delovnih mest.');
	}

	$build['Delovnomesto']=$Delovnomesto;
	return $this->render('JanProjektBundle:Default:vsa_delovna_mesta.html.twig',$build);
 }

  public function dodajAction(Request $request){
    $Delovnomesto=new Delovnomesto();

    $form=$this->createFormBuilder($Delovnomesto)
        ->add('naziv','text')
        ->add('opis','textarea')
        ->add('zahteve','textarea')
        ->add('kaj_nudimo','textarea')
        ->add('datum_veljavnosti','date',array('years'=>range(date('Y'),date('Y')+2)))
  	//  ->add('datumdodajanja','datetime') //funkcija za timestamp
	      ->add('nujno','checkbox')
        ->add('save','submit')
        ->getForm();
    $Delovnomesto->setdatumdodajanja(new \DateTime()); // Sam doda datum dodajanja
    $form->handleRequest($request);
    if($form->isValid()){
      $em=$this->getDoctrine()->getManager();
      $em->persist($Delovnomesto);
      $em->flush();
      return $this->redirect($this->generateUrl('jan_projekt_success'));
    }
    //$build['form']= $form->createView();
     return $this->render('JanProjektBundle:Default:dodaj_delovno_mesto.html.twig',array('form' => $form->createView()));
 
}

  /*
      Spodaj se nahajajo funkcije za Prijavo
  */


  public function pokazi_prijavoAction($id){
	$Prijava=$this->getDoctrine()
			   ->getRepository('JanProjektBundle:Prijava')
			   ->find($id);
	if(!$Prijava){
	 throw $this->createNotFoundException('Ni prijave, ki ima ID '.$id);
  }
	$build['Prijava_item']=$Prijava;
	return $this->render('JanProjektBundle:Default:Prijava_pokazi.html.twig', $build);
  }

  public function pokazi_seznam_prijavAction(){
	$Prijava=$this->getDoctrine()
			   ->getRepository('JanProjektBundle:Prijava')
			   ->findBy(array(),array('datumdodajanja'=>'desc'));

	if(!$Prijava){
	 throw $this->createNotFoundException('Ni  prijav.');
	}

	$build['Prijava']=$Prijava;
	return $this->render('JanProjektBundle:Default:vse_prijave.html.twig',$build);
 }

  public function dodaj_prijavoAction(Request $request,$id=null){ // ce ne dobi parametra id, je null
  $Prijava=new Prijava();
  $form=$this->createFormBuilder($Prijava)
        ->add('ime','text')
        ->add('priimek','text')
        ->add('naslov','text')
        ->add('e_naslov','email')
        ->add('telefon','text')
        ->add('hobiji','textarea')
        ->add('linkedin_profil','text')
        //->add('linkdocv','text')
        ->add('image_file','file')
	      ->add('naziv','hidden')
        //->add('naziv','entity',array('class'=>'Jan\ProjektBundle\Entity\Delovnomesto','property'=>'Naziv'))
	      ->add('profesionalna_zgodovina','textarea')
        ->add('datum_rojstva','date',array('years' => range(date('Y')-100,date('Y')+5)))
        //->add('datumdodajanja','datetime') //timestamp
	      ->add('captcha','captcha')
        ->add('save','submit')
        ->getForm();
  $Prijava->setdatumdodajanja(new \DateTime()); // timestamp  
  $form->handleRequest($request);
  if($form->isValid()){
    $Prijava->setNaziv($id);     // nazivu nastavi id, ki ga dobi kot parameter
    $em=$this->getDoctrine()->getManager();
    $em->persist($Prijava);
    $em->flush();
    return $this->redirect($this->generateUrl('jan_projekt_success'));
  }
  //$build['form']= $form->createView();
  return $this->render('JanProjektBundle:Default:dodaj_prijavo.html.twig',array('form' => $form->createView()));
  }



  //INDEX stran
  public function prvaAction(){
	return $this->render('JanProjektBundle:Default:prva.html.twig');
  }

  //Stran na katero smo preusmerjeni po dodani prijavi(delovnomesto ali prijava)
  public function successAction(){
        return $this->render('JanProjektBundle:Default:success.html.twig');
  }


}
