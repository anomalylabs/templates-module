<?php namespace Anomaly\TemplatesModule\Template\Support\RelationshipFieldType;

use Anomaly\TemplatesModule\Template\Contract\TemplateInterface;

/**
 * Class ValueTableButtons
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ValueTableButtons
{

    /**
     * Handle the buttons.
     *
     * @param ValueTableBuilder $builder
     */
    public function handle(ValueTableBuilder $builder)
    {
        $builder->setButtons(
            [
                'edit'   => [
                    'target'     => '_blank',
                    'permission' => 'anomaly.module.templates::templates.write',
                    'href'       => function ($entry) {

                        /* @var TemplateInterface $entry */
                        $group = $entry->getGroup();

                        return "/admin/templates/{$group->getSlug()}/edit/{$entry->getId()}";
                    },
                ],
                'remove' => [
                    'data-dismiss' => 'relationship',
                    'data-entry'   => 'entry.id',
                ],
            ]
        );
    }
}
