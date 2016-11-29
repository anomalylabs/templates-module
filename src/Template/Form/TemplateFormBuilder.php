<?php namespace Anomaly\TemplatesModule\Template\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\TemplatesModule\Group\Contract\GroupInterface;

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
        'type',
        'group',
    ];

    /**
     * Fire just before saving.
     *
     * @param TemplateFormBuilder $builder
     */
    public function onSaving()
    {
        $entry = $this->getFormEntry();;

        if ($type = $this->getType()) {
            $entry->setAttribute('type', $type);
        }
        
        if ($group = $this->getGroup()) {
            $entry->setAttribute('group', $group);
        }
    }

    /**
     * Return the editor type.
     *
     * @return null|string
     * @throws \Exception
     */
    public function editor()
    {
        if ($type = $this->getType()) {
            return $type;
        }

        $entry = $this->getFormEntry();

        if ($entry && $type = $entry->getType()) {
            return $type;
        }

        throw new \Exception('The type could not be determined.');
    }

    /**
     * Get the type.
     *
     * @return null|string
     */
    public function getType()
    {
        return $this->type;
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

    /**
     * Get the group.
     *
     * @return GroupInterface|null
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set the group.
     *
     * @param GroupInterface $group
     * @return $this
     */
    public function setGroup(GroupInterface $group)
    {
        $this->group = $group;

        return $this;
    }
}
