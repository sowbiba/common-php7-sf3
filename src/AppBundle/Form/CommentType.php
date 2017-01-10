<?php

namespace AppBundle\Form;

use FOS\CommentBundle\Form\CommentType as FOSCommentType;
use FOS\CommentBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\FormBuilderInterface;

class CommentType extends FOSCommentType
{
    public $commentClass;

    public function __construct($commentClass)
    {var_dump($commentClass);die();
        $this->commentClass = $commentClass;

        parent::__construct($commentClass);
    }

    /**
     * Configures a Comment form.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('body', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\TextareaType'), [
            'class' => 'form-control'
        ]);
    }
}
