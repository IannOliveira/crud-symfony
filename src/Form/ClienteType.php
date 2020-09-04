<?php

namespace App\Form;

use App\Entity\Cliente;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cod')
            ->add('nome')
            ->add('nascimento', BirthdayType::class, [
                'format' => 'dd/MM/yyyy',
                ])
            ->add('cpf', TextType::class, [
                'attr' => ['id' => 'customcpf'],
                'label' => "CPF"
            ])
            ->add('acesso', AcessoType::class, [
                
            ])
            ->add('endereco', EnderecoType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cliente::class,
        ]);
    }
}
