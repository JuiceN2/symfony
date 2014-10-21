<?php

namespace Jan\ProjektBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PrijavaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ime')
            ->add('priimek')
            ->add('naslov')
            ->add('enaslov')
            ->add('telefon')
            ->add('datumrojstva')
            ->add('datumdodajanja')
            ->add('hobiji')
            ->add('profesionalnazgodovina')
            ->add('linkedinprofil')
            ->add('linkdocv')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Jan\ProjektBundle\Entity\Prijava'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'jan_projektbundle_prijava';
    }
}
