## Usage[](#usage)

This section will show you how to use the addon via API and in the view layer.


### Groups[](#usage/groups)

Groups represent file folders that help you organize your templates.

When creating and naming template groups keep in mind that the `slug` will be used as the directory name. The `slug` is also used when referring to the template:

    view("templates::group_slug/template_name");

    {{ asset_add("styles.css", "templates::group_slug/template_name.scss");


### Templates[](#usage/templates)

Templates represent physical files that are generated when saving a template. Templates can be used as a view, asset, or data.

The template `slug` will be used as the filename. The kind of template you create will dictate the extension following the filename.

For example if you create a Twig template with the slug `example` in the `layouts` template group the resulting file will be represented as:

    /{templates_path}/layouts/example.twig


#### Using Templates as Views[](#usage/templates/using-templates-as-views)

Twig, HTML, and Markdown templates can all be used through the view system. To access them simply refer to them by their hinted path:

    return view("templates::pages/hello");

You can also refer to templates directly from other templates and views:

    {% extends "templates::layouts/example" %}

    {% block content %}

        {% include "templates::partials/header" %}

        <p>Hello World!</p>
    {% endblock %}


#### Using Templates as Assets[](#usage/templates/using-templates-as-assets)

CSS, SCSS, LESS, JS, and Coffee templates can be used within the `Asset` class like any other asset. Simply reference it's hinted path to include it:

    {{ asset_add("styles.css", "templates::stylesheets/theme.scss") }}

You can easily import other assets from within each other too:

    @import "header.scss"; // Reference another file within the same template group.
    @import "../mixins/theme.scss"; // Assuming you have a template group named "Mixins"


#### Using Templates as Data[](#usage/templates/using-templates-as-data)

Sometimes you might want to store data within a template and parse it later. You can use the `template` plugin function to get the templates `content` and parse it:

    {% set data = yaml(template("example/test_data.yaml").content()) %}

The same can be done via API:

    $template = app(TemplateRepositoryInterface::class)->findByPath('example/test_data.yaml');

    $yaml = (new Yaml)->parse($template->content);


### Artisan[](#usage/artisan)

This section will go over how to use the Templates module with Laravel's Artisan console.


#### templates:sync[](#usage/artisan/templates-sync)

The `sync` command will loop over all template files and syncs them _to_ the database.

    php artisan templates:sync


#### templates:clean[](#usage/artisan/templates-clean)

The `clean` method will go through all template files and removes any not found in the database.

    php artisan templates:clean


#### templates:push[](#usage/artisan/templates-push)

The `push` command will push all templates from the database to the filesystem. This is useful if you import templates via an SQL import.

    php artisan templates:push
