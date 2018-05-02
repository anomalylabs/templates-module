<?php namespace Anomaly\TemplatesModule\Template\Support\RelationshipFieldType;

use Anomaly\TemplatesModule\Template\Contract\TemplateInterface;

class ValueTableButtons
{

    public function handle(ValueTableBuilder $builder)
    {
        $builder->setButtons(
            [
                'edit'   => [
                    'target'     => '_blank',
                    'permission' => 'anomaly.module.templates::templates.write',
                    'href'       => function (TemplateInterface $entry) {

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
