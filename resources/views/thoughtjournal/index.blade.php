@extends('layouts.template3')

@section('content')

<main-content>
    <!-- Breadcrumbs -->  
    {{ Breadcrumbs::render('thoughtjournal') }} 
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
            <h1>Thought Journal</h1>
            <!-- New Entry Link -->
            <a href="{{ route('thoughtjournalnew') }}" class="btn-primary"><i class="fas fa-plus"></i>New Entry</a>
        </div>
        @foreach($thought_journal_entries as $thought_journal_entry)
            <!-- Entry Box -->
            <div class="entry">              
                <div class="entry-body">
                    <!-- Situation Entry -->                  
                    <h2 class="title">{{ $thought_journal_entry->situation }}</h2>
                    <!-- Entry Date -->
                    <h2 class="date">{{ $thought_journal_entry->entry_date }} | Thought Journal Entry</h2>
                    <!-- Emotion Selections -->
                    <div class="emotions">
                        <div class="selections">
                            <ul>                           
                                @foreach($thought_journal_entry->emotions as $emotion)
                                <li>
                                    <img src="{{ $emotion->em_image }}" />
                                    <span>{{ $emotion->em_name }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- Automatic Thought Entries -->
                    <div class="thought auto">
                        <h3>Automatic Thoughts</h3>
                        <ul class="thoughts">
                            @foreach($thought_journal_entry->thoughts as $thought)
                                <li>{{ $thought }}</li>
                            @endforeach
                        </ul>
                        <!-- Thinking Trap Selections -->
                        <div class="selections">
                            <ul>
                                @foreach($thought_journal_entry->thinkingTraps as $thinkingTrap)
                                <li>
                                    <img src="{{ $thinkingTrap->tt_image }}" />
                                    <span>{{ $thinkingTrap->tt_name }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- Balanced Thought Entry -->
                    <div class="thought balanced">
                        <h3>Balanced Thought</h3>
                        <p>{{ $thought_journal_entry->balanced_thought }}</p> 
                    </div>                       
                </div>
                <!-- Controls to Edit/Delete Entry -->
                <div class="entry-controls">
                    {!! Form::open(['action' => ['ThoughtJournalController@destroyEntry', $thought_journal_entry->id], 'method' => 'POST']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        
                        {{Form::submit('Delete', ['class' => 'btn-primary'])}}
                    {!! Form::close() !!}

                    {!! Form::open(['action' => ['ThoughtJournalController@editEntry', $thought_journal_entry->id], 'method' => 'PUT']) !!}
                        {{Form::submit('Edit', ['class' => 'btn-primary'])}}
                    {!! Form::close() !!}  
                </div>
            </div>            
        @endforeach
    
    </div> 
</main-content>                 
                         
@endsection