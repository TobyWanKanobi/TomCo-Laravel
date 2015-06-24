<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

// Home > About
Breadcrumbs::register('about', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Over Ons', route('overons'));
});

// Home > Contact
Breadcrumbs::register('contact', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Contact', route('contact'));
});

// Home > Producten
Breadcrumbs::register('producten', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Producten', route('browse-products'));
});

// Home > Producten > [Category]
Breadcrumbs::register('category', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('producten');
    $breadcrumbs->push($category->title, route('browse-products', $category->id));
});

// Home > Producten > [Category] > [Page]
Breadcrumbs::register('more_information', function($breadcrumbs, $more_information) {
    $breadcrumbs->parent('producten');
    $breadcrumbs->push($more_information->naam, route('more_information', $more_information->product_id));
});

?>