<?php

namespace App\Form;

use App\Entity\Activite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class ActiviteFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idTypeActivite')
            ->add('NomActivite')
            ->add('HeureRdv')
            ->add('HeureDebutActivite')
            ->add('DateFinActivite')
            ->add('PrixActivite')
            ->add('NomResponsable')
            ->add('PrenomResponsable')
            ->add('animation')
            ->add('DescriptionActivite')
            ->add('image', FileType::class,['label' => 'Image file)',

            // unmapped means that this field is not associated to any entity property
            'mapped' => false,
    
            // make it optional so you don't have to re-upload the PDF file
            // every time you edit the Product details
            'required' => false,
    
            // unmapped fields can't define their validation using annotations
            // in the associated entity, so you can use the PHP constraint classes
            'constraints' => [
                new File([
                    'maxSize' => '2000k',
                    'mimeTypes' => [
                        'image/jpg',
                        'image/gif',
                        'image/png',
                    ],
                    'mimeTypesMessage' => 'Please upload a valid image format',
                ])
            ],
        ])
            ;
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Activite::class,
        ]);
    }
}
