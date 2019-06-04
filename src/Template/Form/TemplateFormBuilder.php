<?php namespace Anomaly\TemplatesModule\Template\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\TemplatesModule\Group\Contract\GroupInterface;
use Anomaly\TemplatesModule\Template\Contract\TemplateInterface;

/**
 * Class TemplateFormBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TemplateFormBuilder extends FormBuilder
{

    /**
     * The template type.
     *
     * @var null|string
     */
    protected $type = null;

    /**
     * The group instance.
     *
     * @var null|GroupInterface
     */
    protected $group = null;

    /**
     * The skipped fields.
     *
     * @var array
     */
    protected $skips = [
        'path',
        'type',
    ];

    /**
     * The form buttons.
     *
     * @var array
     */
    protected $buttons = [
        'versions',
        'cancel',
        'view' => [
            'enabled' => 'edit',
            'target'  => '_blank',
        ],
    ];

    /**
     * Fire just before posting.
     *
     * @param TemplateFormBuilder $builder
     */
    public function onSaving()
    {
        /* @var TemplateInterface $entry */
        $entry = $this->getFormEntry();

        if ($type = $this->getType()) {
            $entry->setAttribute('type', $type);
        }
    }

    /**
     * Get the type.
     *
     * @return null|string
     */
    public function getType()
    {
        $entry = $this->getFormEntry();

        return $this->type ?: $entry->getType();
    }

    /**
     * Set the type.
     *
     * @param $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
