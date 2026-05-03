<?php

/**
 * Collections define the content shape of robendi.com. Edit freely — the admin
 * UI updates automatically. Field types: text, textarea, markdown, slug,
 * boolean, number, select, datetime, url.
 */

return [

    // Editable static pages: /about, /uses, /now, etc. The catch-all /{slug}
    // route is registered last so it doesn't swallow more specific routes.
    'pages' => [
        'label'          => 'Pages',
        'label_singular' => 'Page',
        'icon'           => 'file',
        'route'          => '/{slug}',
        'template'       => 'page.twig',
        'order_by'       => 'updated_at DESC',
        'fields' => [
            'title'            => ['type' => 'text',     'required' => true,  'label' => 'Title'],
            'slug'             => ['type' => 'slug',     'required' => true,  'label' => 'Slug', 'help' => 'URL path. Use "home" to override the homepage.'],
            'lede'             => ['type' => 'textarea',                       'label' => 'Lede',  'help' => 'One-sentence intro shown under the title.'],
            'body'             => ['type' => 'markdown',                       'label' => 'Body'],
            'meta_description' => ['type' => 'textarea',                       'label' => 'Meta description', 'help' => '<meta name="description"> — ~160 chars.'],
        ],
    ],

    // Things Roberto built. Listed at /projects, single at /projects/{slug}.
    'projects' => [
        'label'          => 'Projects',
        'label_singular' => 'Project',
        'icon'           => 'box',
        'route'          => '/projects/{slug}',
        'template'       => 'project.twig',
        'list_template'  => 'project-list.twig',
        'order_by'       => 'publish_at DESC',
        'list_limit'     => 100,
        'fields' => [
            'title'        => ['type' => 'text',     'required' => true, 'label' => 'Title'],
            'slug'         => ['type' => 'slug',     'required' => true, 'label' => 'Slug'],
            'summary'      => ['type' => 'textarea', 'required' => true, 'label' => 'Summary',     'help' => 'One-paragraph pitch shown on cards and meta description.'],
            'body'         => ['type' => 'markdown',                     'label' => 'Body',        'help' => 'Long-form write-up. Optional.'],
            'technologies' => ['type' => 'text',                         'label' => 'Technologies','help' => 'Comma-separated, e.g. "React, Vite, Tailwind".'],
            'cover_image'  => ['type' => 'url',                          'label' => 'Cover image', 'help' => 'URL — paste from /admin/media or any image host.'],
            'github_url'   => ['type' => 'url',                          'label' => 'GitHub URL'],
            'live_url'     => ['type' => 'url',                          'label' => 'Live / demo URL'],
            'year'         => ['type' => 'number',                       'label' => 'Year'],
            'award'        => ['type' => 'text',                         'label' => 'Award',       'help' => 'Optional. Shown as a trophy badge on cards + the project page. Example: "1st Place · SBB Prize · LauzHack 2025".'],
            'featured'     => ['type' => 'boolean',                      'label' => 'Featured',    'help' => 'Show on the homepage.'],
        ],
    ],

    // Articles BY Roberto. Default Pebblestack collection — kept.
    'posts' => [
        'label'          => 'Blog Posts',
        'label_singular' => 'Post',
        'icon'           => 'edit',
        'route'          => '/blog/{slug}',
        'template'       => 'post.twig',
        'list_template'  => 'post-list.twig',
        'order_by'       => 'publish_at DESC',
        'fields' => [
            'title'       => ['type' => 'text',     'required' => true, 'label' => 'Title'],
            'slug'        => ['type' => 'slug',     'required' => true, 'label' => 'Slug'],
            'excerpt'     => ['type' => 'textarea',                     'label' => 'Excerpt', 'help' => 'Short summary for list pages and meta description.'],
            'cover_image' => ['type' => 'url',                          'label' => 'Cover image'],
            'body'        => ['type' => 'markdown', 'required' => true, 'label' => 'Body'],
            'author'      => ['type' => 'text',                         'label' => 'Author', 'help' => 'Defaults to "Roberto Bendinelli" if blank.'],
        ],
    ],

    // Articles ABOUT Roberto — press, interviews, mentions, features.
    'news' => [
        'label'          => 'News & Press',
        'label_singular' => 'Article',
        'icon'           => 'edit',
        'route'          => '/news/{slug}',
        'template'       => 'news.twig',
        'list_template'  => 'news-list.twig',
        'order_by'       => 'publish_at DESC',
        'fields' => [
            'title'       => ['type' => 'text',     'required' => true, 'label' => 'Title'],
            'slug'        => ['type' => 'slug',     'required' => true, 'label' => 'Slug'],
            'source'      => ['type' => 'text',     'required' => true, 'label' => 'Source',      'help' => 'Outlet or publisher, e.g. "TechCrunch", "EPFL News".'],
            'source_url'  => ['type' => 'url',                          'label' => 'Original URL','help' => 'Link to the article on the source site.'],
            'kind'        => ['type' => 'select',                       'label' => 'Kind',        'options' => ['Mention', 'Interview', 'Feature', 'Award', 'Talk', 'Podcast'], 'help' => 'How Roberto appears in this piece.'],
            'excerpt'     => ['type' => 'textarea',                     'label' => 'Excerpt',     'help' => 'Pull-quote or one-paragraph summary.'],
            'cover_image' => ['type' => 'url',                          'label' => 'Cover image'],
            'body'        => ['type' => 'markdown',                     'label' => 'Notes',       'help' => 'Optional: full text, your commentary, or a teaser. The original lives at the source URL.'],
        ],
    ],

    // Public contact form. Submissions land in /admin/forms/contact.
    'contact' => [
        'label'          => 'Contact',
        'label_singular' => 'Submission',
        'icon'           => 'edit',
        'is_form'        => true,
        'fields' => [
            'name'    => ['type' => 'text',     'required' => true, 'label' => 'Name'],
            'email'   => ['type' => 'text',     'required' => true, 'label' => 'Email'],
            'subject' => ['type' => 'text',                         'label' => 'Subject'],
            'message' => ['type' => 'textarea', 'required' => true, 'label' => 'Message'],
        ],
    ],

];
