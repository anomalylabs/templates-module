<?php namespace Anomaly\TemplatesModule\Template;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;
use Anomaly\TemplatesModule\Template\Command\SetPath;
use Anomaly\TemplatesModule\Template\Contract\TemplateInterface;

/**
 * Class TemplateObserver
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TemplateObserver extends EntryObserver
{

    /**
     * Fired just before creating an entry.
     *
     * @param EntryInterface|TemplateInterface $entry
     */
    public function creating(EntryInterface $entry)
    {
        if (!$entry->getAttribute('path')) {
            $this->dispatch(new SetPath($entry));
        }

        parent::creating($entry);
    }
}
