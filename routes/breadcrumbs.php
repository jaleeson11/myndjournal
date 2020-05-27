<?php

//Dashboard 
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Dashboard > Thought Journal
Breadcrumbs::for('thoughtjournal', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Thought Journal', route('thoughtjournal'));
});

// Dashboard > Gratitude Journal
Breadcrumbs::for('gratitudejournal', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Gratitude Journal', route('gratitudejournal'));
});

// Dashboard > Thought Journal > New Entry
Breadcrumbs::for('thoughtjournalnew', function ($trail) {
    $trail->parent('thoughtjournal');
    $trail->push('New Entry', route('thoughtjournalnew'));
});

// Dashboard > Gratitude Journal > New Entry
Breadcrumbs::for('gratitudejournalnew', function ($trail) {
    $trail->parent('gratitudejournal');
    $trail->push('New Entry', route('gratitudejournalnew'));
});

// Dashboard > Thought Journal > Edit Entry
Breadcrumbs::for('thoughtjournaledit', function ($trail, $tj_entry) {
    $trail->parent('thoughtjournal');
    $trail->push('Edit Entry', route('thoughtjournaledit', $tj_entry->id));
});

// Dashboard > Thought Journal > Edit Entry
Breadcrumbs::for('gratitudejournaledit', function ($trail, $gj_entry) {
    $trail->parent('gratitudejournal');
    $trail->push('Edit Entry', route('gratitudejournaledit', $gj_entry->id));
});

?>