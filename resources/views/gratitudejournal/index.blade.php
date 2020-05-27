@extends('layouts.template3')

@section('content')

<main-content>
    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('gratitudejournal') }} 
    <div class="container">
        <!-- Alert Messages -->
        @if(session()->has('update'))
            <div class="alert-box success">
                <h3><i class="fas fa-check-circle"></i>Success!</h3>
                {{ session()->get('update') }}
            </div>
        @endif
        @if(session()->has('destroy'))
            <div class="alert-box success">
                <h3><i class="fas fa-check-circle"></i>Success!</h3>
                {{ session()->get('destroy') }}
            </div>
        @endif
        <!-- Journal Header -->
        <div class="journal-header">
            <!-- Title -->
            <h1>Gratitude Journal</h1>
            <!-- New Entry Link -->
            <a href="{{ route('gratitudejournalnew') }}" class="btn-primary"><i class="fas fa-plus"></i>New Entry</a>
        </div>
        @foreach($gratitude_journal_entries as $gratitude_journal_entry)
            <!-- Entry Box  -->
            <div class="entry">              
                <div class="entry-body"> 
                    <!-- Day Rating Selection -->
                    @foreach($gratitude_journal_entry->dayRatings as $dayRating)
                        <h2 class="title">
                            {{ $dayRating->dr_name }}<img src="{{ $dayRating->dr_image }}" />
                        </h2>
                    @endforeach
                    <!-- Entry Date -->
                    <h2 class="date">{{ $gratitude_journal_entry->entry_date }} | Gratitude Journal Entry</h2>
                    <!-- Self Gratitude Entries -->
                    <div class="gratitudes self-gratitudes"> 
                        <h3>Self Gratitude</h3>
                        <ul>
                            @foreach($gratitude_journal_entry->self_gratitudes as $self_gratitude)
                                <li>{{ $self_gratitude }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Life Gratitude Selections -->
                    <div class="gratitudes life-gratitudes">
                        <h3>Life Gratitude</h3>
                        <div class="selections">              
                        <ul>                           
                            @foreach($gratitude_journal_entry->lifeGratitudes as $lifeGratitude)
                            <li>
                                <img src="{{ $lifeGratitude->lgr_image }}" />
                                <span>{{ $lifeGratitude->lgr_name }}</span>
                            </li>
                            @endforeach
                        </ul> 
                        </div>
                    </div>     
                </div>
                <!-- Controls to Edit/Delete Entry -->
                <div class="entry-controls">
                    {!! Form::open(['action' => ['GratitudeJournalController@destroyEntry', $gratitude_journal_entry->id], 'method' => 'POST']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                            
                        {{Form::submit('Delete', ['class' => 'btn-primary'])}}
                    {!! Form::close() !!}

                    {!! Form::open(['action' => ['GratitudeJournalController@editEntry', $gratitude_journal_entry->id], 'method' => 'PUT']) !!}
                        {{Form::submit('Edit', ['class' => 'btn-primary'])}}
                    {!! Form::close() !!}  
                </div>
            </div>            
        @endforeach
    </div>
</main-content> 

@endsection