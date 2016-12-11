<?php namespace Anomaly\TemplatesModule\Group\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class GroupFormBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class GroupFormBuilder extends FormBuilder
{

    /**
     * The form fields.
     *
     * @var array|string
     */
    protected $fields = [
        'name',
        'slug' => [
            'disabled' => 'edit',
        ],
        'description',
    ];
}
