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
     * The template extension.
     *
     * @var null|string
     */
    protected $extension = null;

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
        'extension',
        'group',
        'path',
    ];

    /**
     * Fire just before saving.
     *
     * @param TemplateFormBuilder $builder
     */
    public function onSaving()
    {
        /* @var TemplateInterface $entry */
        $entry = $this->getFormEntry();

        if ($extension = $this->getExtension()) {
            $entry->setAttribute('extension', $extension);
        }

        if ($group = $this->getGroup()) {
            $entry->setAttribute('group', $group);
        }

        if (!$entry->getAttribute('path')) {

            $group     = $this->getGroup();
            $template  = $this->getFormValue('slug');
            $extension = $entry->getExtension();

            $entry->setAttribute('path', "{$group->getSlug()}/{$template}.{$extension}");
        }
    }

    /**
     * Return the editor extension.
     *
     * @return null|string
     * @throws \Exception
     */
    public function editor()
    {
        if ($extension = $this->getExtension()) {
            return config('anomaly.module.templates::templates.mode.' . $extension);
        }

        /* @var TemplateInterface $entry */
        $entry = $this->getFormEntry();

        if ($entry && $extension = $entry->getExtension()) {
            return config('anomaly.module.templates::templates.mode.' . $extension);
        }

        throw new \Exception('The extension could not be determined.');
    }

    /**
     * Get the extension.
     *
     * @return null|string
     */
    public function getExtension()
    {
        $entry = $this->getFormEntry();

        return $this->extension ?: $entry->getExtension();
    }

    /**
     * Set the extension.
     *
     * @param $extension
     * @return $this
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

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
     * Get the contextual group ID.
     *
     * @return int
     */
    public function getGroupId()
    {
        if ($group = $this->getGroup()) {
            return $group->getId();
        }

        /* @var TemplateInterface $entry */
        $entry = $this->getFormEntry();

        return $entry->getGroupId();
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
