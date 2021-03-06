<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InputType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("name", TextType::class, ["label" => "Imię i nazwisko", "attr" => ["placeholder" => "np. Jan Kowalski"]])
            ->add("position", TextType::class, ["label" => "Stanowisko", "attr" => ["placeholder" => "np. Programista PHP"]])
            ->add("email", TextType::class, ["label" => "Adres email", "attr" => ["placeholder" => "np. jan@kowalski.pl"]])
            ->add("mobile", TextType::class, ["label" => "Numer telefonu", "attr" => ["placeholder" => "np. +48 604 000 000"]])
            ->add("www", TextType::class, ["data" => "http://coders.expert"])
            ->add("img", ChoiceType::class, ["choices" => [
                "FutureNetFoundation" => "fundacja.jpg",
                "FutureNet" => "future.png",
                "FutureNet blue" => "fn_blue.png",
                "CodersHouse" => "logo.png",
                "FutureNet Cafe" => "fncafe.png",

            ]])
            ->add("submit", SubmitType::class, ["label" => "Wygeneruj stopkę!", "attr" => []])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_input_type';
    }
}
