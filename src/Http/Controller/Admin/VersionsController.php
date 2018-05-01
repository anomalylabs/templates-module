<?php namespace Anomaly\TemplatesModule\Http\Controller\Admin;

use Anomaly\TemplatesModule\Template\TemplateModel;

/**
 * Class VersionsController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class VersionsController extends \Anomaly\Streams\Platform\Http\Controller\VersionsController
{

    /**
     * The versioned model.
     *
     * @var string
     */
    protected $model = TemplateModel::class;

}
