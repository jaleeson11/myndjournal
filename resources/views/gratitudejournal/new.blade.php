@extends('layouts.template3')

@section('content')

<main-content>  
    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('gratitudejournalnew') }} 
    <div class="container">
        <!-- From Validation Errors -->
        @if (count($errors) > 0)
            <div class="alert-box error">
                <h3><i class="fas fa-exclamation-circle"></i>Error</h3>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Title -->
        <h1>New Entry</h1>
        <!-- Journal Entry Template -->
        <gratitude-journal-entry></gratitude-journal-entry>
    </div> 
</main-content>                 
                         
@endsection