<?php namespace Anomaly\TemplatesModule\Template;

use Anomaly\EditorFieldType\EditorFieldTypeStorage;
use Anomaly\TemplatesModule\Template\Contract\TemplateInterface;

/**
 * Class TemplateStorage
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TemplateStorage extends EditorFieldTypeStorage
{

    /**
     * Return the directory.
     *
     * @return null|string
     */
    public function directory()
    {
        if (!parent::directory()) {
            return null;
        }

        /* @var TemplateInterface $entry */
        $entry = $this->fieldType->getEntry();

        if (!$group = $entry->getGroup()) {
            return null;
        }

        return 'templates/' . $group->getSlug();
    }

    /**
     * Return the filename.
     *
     * @return null|string
     */
    public function filename()
    {
        /* @var TemplateInterface $entry */
        $entry = $this->fieldType->getEntry();

        $this->fieldType->configSet('mode', $entry->editor());

        return $entry->getSlug() . '.' . $this->fieldType->extension();
    }
}
