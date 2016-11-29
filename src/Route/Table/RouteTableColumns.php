<?php namespace Anomaly\TemplatesModule\Route\Table;

use Anomaly\TemplatesModule\Route\Contract\RouteInterface;
use Anomaly\TemplatesModule\Template\TemplateModel;

/**
 * Class RouteTableColumns
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class RouteTableColumns
{

    /**
     * Handle the buttons.
     *
     * @param RouteTableBuilder $builder
     */
    public function handle(RouteTableBuilder $builder)
    {
        $builder->setColumns(
            [
                'uri',
                'template' => [
                    'value' => function (RouteInterface $entry) {

                        /* @var TemplateModel $template */
                        $template = $entry->getTemplate();

                        return $template->decorated->path();
                    },
                ],
            ]
        );
    }
}
