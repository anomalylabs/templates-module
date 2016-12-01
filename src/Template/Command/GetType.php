<?php namespace Anomaly\TemplatesModule\Template\Command;

use Illuminate\Contracts\Config\Repository;

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
     * @param Repository $config
     * @return null|string
     */
    public function handle(Repository $config)
    {
        foreach ($config->get('anomaly.field_type.editor::editor.modes') as $mode => $type) {
            if ($type['extension'] == $this->extension) {
                return $mode;
            }
        }

        return null;
    }
}
