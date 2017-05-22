# AgriLife Extension Research (WordPress Plugin)

[ ![Codeship Status for AgriLife/agrilife-extension-research](https://app.codeship.com/projects/1ade8650-2133-0135-19e8-660310782f44/status?branch=staging)](https://app.codeship.com/projects/221267)
[ ![Codeship Status for AgriLife/agrilife-extension-research](https://app.codeship.com/projects/1ade8650-2133-0135-19e8-660310782f44/status?branch=master)](https://app.codeship.com/projects/221267)

Functionality for AgriLife Extension Research sites

## WordPress Requirements

1. [AgriFlex3 theme](https://github.com/agrilife/agriflex3)
2. [AgriLife Core plugin](https://github.com/agrilife/agrilife-core)
3. Advanced Custom Fields 5+ plugin (for Landing Page 1 Template)
4. Soliloquy Slider plugin (for Landing Page 1 Template)

## Installation

1. [Download the latest release](https://github.com/AgriLife/agrilife-extension-research/releases/latest)
2. Upload the plugin to your site

## Features

* Required appearance and information for Extension Research sites
* Widget Areas
    * Footer Left: This is the footer widget area. It appears to the left of the required links. This widget area works best with the Text widget.
    * Home Sidebar: This is the Home sidebar widget area. It appears in the right column of the home page. This widget area works best with menus and Genesis Featured Posts.
* Page Templates
    * Home: Full-width and custom styled Soliloquy slider, programs, and a sidebar
* Page Layouts:

![Content Sidebar](http://agrilife.org/wp-content/themes/genesis/lib/admin/images/layouts/cs.gif)
![Sidebar Content](http://agrilife.org/wp-content/themes/genesis/lib/admin/images/layouts/sc.gif)
![Sidebar Content Sidebar](http://agrilife.org/wp-content/themes/genesis/lib/admin/images/layouts/scs.gif)
![Content](http://agrilife.org/wp-content/themes/genesis/lib/admin/images/layouts/c.gif)

## Development Installation

1. Copy this repo to the desired location.
2. In your terminal, navigate to the plugin location 'cd /path/to/the/plugin'
3. Run 'composer install' to set up the php modules
4. Run 'npm install' to set up remaining modules

## Development Notes

1. The ACF fields imported as JSON (flexiblecolumns-columnsaddon-details.json and publications-details.json) do not receive the "_name" property needed by the plugin while processing a field, which results in PHP Notice messages in debug mode. Add this property manually to new ACF fields in the JSON files.

## Development Requirements

* Node: http://nodejs.org/
* NPM: https://npmjs.org/
