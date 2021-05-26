<?php

namespace App\Form;

use App\Entity\Animation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class AnimationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('NomAnimation')
        ->add('LimiteAge')
        ->add('PrixAnimation')
        ->add('NombreDePlace')
        ->add('DescriptionAnimation')
        ->add('CommentaireAnimation')
        ->add('DifficulteAnimation')
        // On ajoute le champ 'image' dans le formulaire
        // Il n'est pas lié à la bdd donc mapped =false
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
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Animation::class,
        ]);
    }
}
