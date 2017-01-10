<?php

namespace AppBundle\Form;

use FOS\CommentBundle\Form\CommentType as FOSCommentType;
use FOS\CommentBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentType extends AbstractType
{
    /**
     * Configures a Comment form.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('body', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\TextareaType'), [
            'attr' => ['class' => 'form-control']
        ]);
//        $builder->addEventSubscriber(new CommentFormSubscriber());
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Comment',
        ));
    }

    public function getParent()
    {
        return 'fos_comment_comment';
    }
    public function getName()
    {
        return "app_comment";
    }
}
