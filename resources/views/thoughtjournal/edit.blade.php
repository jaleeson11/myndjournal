@extends('layouts.template3')

@section('content')

<main-content> 
    <!-- Breadcrumbs --> 
    {{ Breadcrumbs::render('thoughtjournaledit', $tj_entry) }} 
    <div class="container">
        <!-- Title -->
        <h1>Edit Entry</h1>
        <!-- Edit Journal Entry Template -->
        <thought-journal-edit :test="{{ $tj_entry->id }}"></thought-journal-edit>
    </div> 
</main-content>                 
                         
@endsection