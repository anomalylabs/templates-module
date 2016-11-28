<?php

return [
    'admin/templates'           => 'Anomaly\TemplatesModule\Http\Controller\Admin\TemplatesController@index',
    'admin/templates/create'    => 'Anomaly\TemplatesModule\Http\Controller\Admin\TemplatesController@create',
    'admin/templates/edit/{id}' => 'Anomaly\TemplatesModule\Http\Controller\Admin\TemplatesController@edit',
];
