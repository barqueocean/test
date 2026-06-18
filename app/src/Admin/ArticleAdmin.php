<?php

namespace App\Admin;

use App\Entity\Article;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

final class ArticleAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('title')
            ->add('slug')
            ->add('content')
            ->add('publishedAt')
        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->addIdentifier('id')
            ->addIdentifier('title')
            ->add('slug')
            ->add('publishedAt')
        ;
    }
}
