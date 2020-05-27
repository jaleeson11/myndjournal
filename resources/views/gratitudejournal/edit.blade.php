@extends('layouts.template3')

@section('content')

<main-content> 
    <!-- Breadcrumbs --> 
    {{ Breadcrumbs::render('gratitudejournaledit', $gj_entry) }} 
    <div class="container">
        <!-- Title -->
        <h1>Edit Entry</h1>
        <!-- Edit Journal Entry Template -->
        <gratitude-journal-edit :test="{{ $gj_entry->id }}"></gratitude-journal-edit>
    </div> 
</main-content>                 
                         
@endsection