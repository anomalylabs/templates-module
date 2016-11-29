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
        $builder->setFields(
            [
                '*',
                'content' => [
                    'config' => [
                        'mode' => $builder->editor(),
                    ],
                ],
            ]
        );
    }
}
