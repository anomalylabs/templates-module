<?php namespace Anomaly\TemplatesModule\Template\Command;

/**
 * Class GetType
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class GetType
{

    /**
     * The file extension.
     *
     * @var string
     */
    protected $extension;

    /**
     * Create a new GetType instance.
     *
     * @param $extension
     */
    public function __construct($extension)
    {
        $this->extension = $extension;
    }

    /**
     * Handle the command.
     *
     * @return null|string
     */
    public function handle()
    {
        foreach (config('anomaly.field_type.editor::editor.modes') as $mode => $type) {
            if ($type['extension'] == $this->extension) {
                return $mode;
            }
        }

        return null;
    }
}
