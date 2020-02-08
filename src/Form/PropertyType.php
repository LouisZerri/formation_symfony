<?php

namespace App\Form;

use App\Entity\Property;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                "label" => "Titre"
            ])
            ->add('description', null, [
                "label" => "Description"
            ])
            ->add('surface', null, [
                "label" => "Surface"
            ])
            ->add('rooms', null, [
                "label" => "Pièces"
            ])
            ->add('bedrooms', null, [
                "label" => "Chambres"
            ])
            ->add('floor', null, [
                "label" => "Étages"
            ])
            ->add('price')
            ->add('heat', ChoiceType::class,[
                'choices' => $this->getChoices()
            ])
            ->add('city', null,[
                "label" => "Ville"
            ])
            ->add('address', null, [
                "label" => "Adresse"
            ])
            ->add('postal_code', null, [
                "label" => "Code postal"
            ])
            ->add('sold', null, [
                "label" => "Vendu"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
            'translation_domain' => 'forms'
        ]);
    }

    private function getChoices()
    {
        $choices = Property::HEAT;
        $output = [];
        foreach ($choices as $key => $value) 
        {
            $output[$value] = $key;
        }

        return $output;
    }
}
