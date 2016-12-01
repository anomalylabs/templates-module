<?php namespace Anomaly\TemplatesModule\Template;

use Anomaly\EditorFieldType\EditorFieldType;
use Anomaly\Streams\Platform\Entry\EntryPresenter;
use Anomaly\TemplatesModule\Template\Contract\TemplateInterface;

/**
 * Class TemplatePresenter
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TemplatePresenter extends EntryPresenter
{

    /**
     * The decorated object.
     *
     * @var TemplateInterface
     */
    protected $object;

    /**
     * Return a label.
     *
     * @param null $text
     * @param null $context
     * @param null $size
     * @return string
     */
    public function label($text = null, $context = null, $size = null)
    {
        if (!$context && in_array($this->object->getExtension(), ['css', 'less', 'scss'])) {
            $context = 'info';
        }

        if (!$context && in_array($this->object->getExtension(), ['html', 'twig'])) {
            $context = 'primary';
        }

        if (!$context && in_array($this->object->getExtension(), ['js'])) {
            $context = 'danger';
        }

        return parent::label($text, $context, $size);
    }
}
