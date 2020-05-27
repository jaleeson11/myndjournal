@extends('layouts.template3')

@section('content')
    <main-content>
        <!-- Breadcrumbs -->
        {{ Breadcrumbs::render('dashboard') }}
        <div class="container">
            <!-- Alert Messages -->
            @if(session()->has('success'))
                <div class="alert-box success">
                    <h3><i class="fas fa-check-circle"></i>Congratulations!</h3>
                    {{ session()->get('success') }}
                </div>
            @elseif(session()->has('error'))
                <div class="alert-box error">
                    <h3><i class="fas fa-exclamation-circle"></i>Error</h3>
                    {{ session()->get('error') }}
                </div>
            @endif
            <!-- Title -->
            <h1>Dashboard</h1>
            <!-- Thought Journal Box -->
            <div id="tj" class="journal">
                <div class="upper">
                    <h2><i class="fas fa-book"></i>Thought Journal</h2>
                    <!-- Number of Entries Submitted By User -->
                    <div class="num-entries">
                        <span>{{ $tj_entries_num }}</span> Entries
                    </div>
                    <div class="line"></div>
                    <!-- Entry Steps -->
                    <ul>
                        <li>Situation</li>
                        <li>Emotions</li>
                        <li>Thoughts</li>
                        <li>Thinking Traps</li>
                        <li>Balance Thought</li>
                    </ul>
                    <!-- Controls to Add Entry or View Journal -->
                    <div class="journal-controls">
                        <a class="btn-primary" href="{{ route('thoughtjournalnew') }}"><i class="fas fa-plus-circle"></i>New Entry</a>
                        <a class="btn-primary" href="{{ route('thoughtjournal') }}"><i class="fas fa-book"></i>View Journal</a>
                    </div>
                </div>
            </div>
            <!-- Gratitude Journal Box -->
            <div id="gj" class="journal">
                <div class="upper">
                    <h2><i class="fas fa-book"></i>Gratitude Journal</h2>
                    <!-- Number of Entries Submitted By User -->
                    <div class="num-entries">
                        <span>{{ $gj_entries_num }}</span> Entries
                    </div>
                    <div class="line"></div>
                    <!-- Entry Steps -->
                    <ul>
                        <li>Day Rating</li>
                        <li>Self Gratitude</li>
                        <li>Life Gratitude</li>
                    </ul>
                    <!-- Controls to Add Entry or View Journal -->
                    <div class="journal-controls">
                        <a class="btn-primary" href="{{ route('gratitudejournalnew') }}"><i class="fas fa-plus-circle"></i>New Entry</a>
                        <a class="btn-primary" href="{{ route('gratitudejournal') }}"><i class="fas fa-book"></i>View Journal</a>
                    </div>
                </div>
            </div>
    </main-content>
@endsection