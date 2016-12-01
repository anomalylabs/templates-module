<?php namespace Anomaly\TemplatesModule\Template\Form;

/**
 * Class TemplateFormFields
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TemplateFormFields
{

    /**
     * Handle the fields.
     *
     * @param TemplateFormBuilder $builder
     * @throws \Exception
     */
    public function handle(TemplateFormBuilder $builder)
    {
        $type  = $builder->getType();
        $group = $builder->getGroupId();
        $id    = $builder->getFormEntryId();

        $builder->setFields(
            [
                '*',
                'slug'    => [
                    'rules' => [
                        'unique:templates_templates,slug,' . $id . ',id,group_id,' . $group . ',type,' . $type,
                    ],
                ],
                'content' => [
                    'config' => [
                        'mode' => $builder->editor(),
                    ],
                ],
            ]
        );
    }
}
