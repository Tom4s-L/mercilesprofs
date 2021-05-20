<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('author', null, [
                'label' => 'Votre nom',

                'label_attr' => ['class' => 'leading-7 text-md text-white'],

                'attr' => ['class' => 'bg-gray-100 bg-opacity-100 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200  h-11 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out mb-3']
            ])

            ->add('receiver', null, [
                'label' => 'Destinataire',

                'label_attr' => ['class' => 'leading-7 text-md text-white '],

                'attr' => ['class' => 'bg-gray-100 bg-opacity-100 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-11 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out mb-3'],

                'placeholder' => 'Laissez vide si pas de destinataire en particulier',
            ])

            ->add('content', TextareaType::class, [
                'label' => 'Contenu de votre message',

                'label_attr' => ['class' => 'leading-7 text-md text-white'],

                'attr' => ['class' => 'w-full bg-gray-100 bg-opacity-100 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-60 text-base outline-none text-gray-700 py-1 px-3 leading-6 transition-colors duration-200 ease-in-out '],
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => ['class' => 'flex mx-auto text-white bg-green border-0 mt-16 py-2 px-8 focus:outline-none hover:bg-green-900 rounded text-lg'], 
            ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
