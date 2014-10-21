<?php

namespace Jan\ProjektBundle\Controller;


use Jan\ProjektBundle\Entity\Delovnomesto;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('JanProjektBundle:Default:index.html.twig', array('name' => $name));
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
			   ->findAll();

	if(!$Delovnomesto){
	throw $this->createNotFOundException('Ni  prostih delovnih mest.');
	}

	$build['Delovnomesto']=$Delovnomesto;
	return $this->render('JanProjektBundle:Default:vsa_delovna_mesta.html.twig',$build);
 }

  public function dodajAction(Request $request){
    $Delovnomesto=new Delovnomesto();
    $Delovnomesto->setCreatedDate(new \Datetime());

    $form=$this->createFormBuilder($Delovnomesto)
        ->add('naziv','text')
        ->add('opis','text')
        ->add('zahteve','text')
        ->add('kajnudimo','text')
        ->add('datumveljanosti','Datetime')
        ->add('datumdodajanja','Datetime')
        ->add('save','submit')
        ->getForm();

    $form->handleRequest($request);
    if($form->isValid()){
    $em=$this->getDoctrine()->getManager();
    $em->persist($Delovnomesto);
    $em->flush();
    return new Response('Uspesno dodano delovno mesto');
    }

    $build['form']= $form->createView();
    return %this->render('JanProjektBundle:Default:dodaj_delovno_mesto.html.twig',$build);
  }



}

