<?php
/**
 * config.php
 *
 * Author: pixelcave
 *
 * Configuration file. It contains variables used in the template as well as the primary navigation array from which the navigation is created
 *
 */

/* Template variables */
$template = array(
    'name'          => 'AppUI - Frontend',
    'author'        => 'pixelcave',
    'robots'        => 'noindex, nofollow',
    'title'         => 'AppUI Frontend - Responsive Bootstrap Site Template',
    'description'   => 'AppUI Frontend is a Responsive Bootstrap Site Template created by pixelcave and added as a bonus in AppUI Admin Template package',
    'active_page'   => basename($_SERVER['PHP_SELF'])
);

/* Primary navigation array (the primary navigation will be created automatically based on this array) */
$primary_nav = array(
    array(
        'name'  => 'Welcome',
        'url'   => 'index.php'
    ),
    array(
        'name'  => 'Features',
        'url'   => 'features.php'
    ),
    array(
        'name'  => 'Pricing',
        'url'   => 'pricing.php'
    ),
    array(
        'name'  => 'Contact',
        'url'   => 'contact.php'
    ),
    array(
        'name'  => 'Pages',
        'sub'   => array(
            array(
                'name'  => 'Blog',
                'url'   => 'blog.php'
            ),
            array(
                'name'  => 'Blog Post',
                'url'   => 'blog_post.php'
            ),
            array(
                'name'  => 'Portfolio',
                'url'   => 'portfolio.php'
            ),
            array(
                'name'  => 'Project',
                'url'   => 'project.php'
            ),
            array(
                'name'  => 'Team',
                'url'   => 'team.php'
            ),
            array(
                'name'  => 'FAQ',
                'url'   => 'faq.php'
            ),
            array(
                'name'  => 'Jobs',
                'url'   => 'jobs.php'
            ),
            array(
                'name'  => 'Search Results',
                'url'   => 'search_results.php'
            )
        )
    ),
    array(
        'name'  => 'Get Started <i class="fa fa-arrow-right"></i>',
        'class' => 'featured',
        'url'   => 'http://pixelcave.com/demo/appui'
    )
);