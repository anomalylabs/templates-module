<?php namespace Anomaly\TemplatesModule\Route\Table;

use Anomaly\TemplatesModule\Route\Contract\RouteInterface;

/**
 * Class RouteTableButtons
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class RouteTableButtons
{

    /**
     * Handle the buttons.
     *
     * @param RouteTableBuilder $builder
     */
    public function handle(RouteTableBuilder $builder)
    {
        $builder->setButtons(
            [
                'edit',
                'view'     => [
                    'target' => '_blank',
                ],
                'template' => [
                    'type' => 'primary',
                    'icon' => 'fa fa-object-ungroup',
                    'enabled' => function (RouteInterface $entry) {
                        return ($entry->getTemplate());
                    },
                    'href' => function (RouteInterface $entry) {

                        if (!$template = $entry->getTemplate()) {
                            return null;
                        }

                        $group = $entry
                            ->getTemplate()
                            ->getGroup()
                            ->getSlug();

                        return "/admin/templates/{$group}/edit/{$template->getId()}";
                    },
                ],
            ]
        );
    }
}
