<?php

/*
 * This file is part of the Beloop package.
 *
 * Copyright (c) 2016 AHDO Studio B.V.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Arkaitz Garro <arkaitz.garro@gmail.com>
 */

namespace Beloop\Bundle\UserBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

use Beloop\Bundle\CoreBundle\DependencyInjection\Abstracts\AbstractConfiguration;

/**
 * Class Configuration.
 */
class Configuration extends AbstractConfiguration
{
    /**
     * {@inheritdoc}
     */
    protected function setupTree(ArrayNodeDefinition $rootNode)
    {
        $rootNode
            ->children()
                ->arrayNode('mapping')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->append($this->addMappingNode(
                            'abstract_user',
                            'Beloop\Component\User\Entity\Abstracts\AbstractUser',
                            '@BeloopUserBundle/Resources/config/doctrine/AbstractUser.orm.yml',
                            'default',
                            true
                        ))
                        ->append($this->addMappingNode(
                            'user',
                            'Beloop\Component\User\Entity\User',
                            '@BeloopUserBundle/Resources/config/doctrine/User.orm.yml',
                            'default',
                            true
                        ))
                    ->end()
                ->end()
            ->end();
    }
}