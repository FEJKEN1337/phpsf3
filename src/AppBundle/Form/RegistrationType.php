<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    
    protected $params;
    
    public function __construct($params = null) {
        $this->params = $params;
    }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imie', 'text', array('label' => "Imię"
                    ))
            ->add('nazwisko', 'text', array('label' => "Nazwisko"
                ))
            ->add('telefon', 'text')
            ->add('tor', 'text', array('attr' => array(
                                       'disabled' => 'disabled',
                                       'class' => 'numer_toru' 
                                       )))
            ->add('data_rezerwacji', 'text', array('attr' => array(
                                                   'disabled' => 'disabled',
                                                   'class' => 'data_rezerwacji' 
                                                    )))
            ->add('od', 'text', array('attr' => array(
                                                   'disabled' => 'disabled',
                                                   'class' => 'czas_od' 
                                                    )))
            
            ->add('Rezerwacja', 'submit');
        
            
                switch($this->params){
                    case 30:
                        $choiceArray = array();
                        break;
                    case 60:
                        $choiceArray = array('godzina' => '1h');
                        break;
                    case 90:
                        $choiceArray = array('godzina' => '1h', 'poltorej' => '1,5h');
                        break;
                    default:
                        $choiceArray = array('godzina' => '1h', 'poltorej' => '1,5h', 'dwie' => '2h');
                }
            
            $builder->add('do', 'choice', array(
                'choices' => $choiceArray, 
                'expanded' => false,
                'multiple' => false,
                'label' => 'Czas: '
            ));
        
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Registration'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_registration';
    }
}
