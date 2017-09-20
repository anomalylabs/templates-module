## Introduction[](#introduction)

Manage custom view templates, assets, and data from your control panel.

<div class="alert alert-danger">**Heads Up:** The Templates module is a paid addon! Please checkout our store or ask about our developer partnership for repository access.</div>


### Features[](#introduction/features)

The Templates module comes loaded with convenient features.

*   Manage custom Twig, HTML, and Markdown view templates.
*   Manage custom CSS, LESS, and SCSS assets.
*   Manage custom JSON and YAML data files.
*   All templates are routable.
*   Keep templates organized with templates groups.
*   Effortlessly sync, clean, and push templates to and from the database.
*   Integrates with Pyro's view and asset services.
*   Allows you to drop in files, sync, and have a website or project ready in minutes.


### Installation[](#introduction/installation)

The Templates module is a paid addon and requires purchasing from the addon store OR a paid subscription.

##### Installing from Store Download

You can install the Templates module by downloading the addon and placing it within your site's addon directory:

    /addons/{application_ref}/anomaly/*

Next install the addon with the `addon:install` command:

    php artisan addon:install anomaly.module.templates

##### Installing with Composer Subscription

You can install the Templates module with Composer as a VCS repository if you have a subscription:

    {
         "require": {
            "anomaly/templates-module": "~1.1.0"
        },
        "repositories": [
            {
                "type": "vcs",
                "url": "https://github.com/anomalylabs/templates-module"
            }
        ]
    }
