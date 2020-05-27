@extends('layouts.template1')

@section('content')
<!-- Home Banner -->
<header>
    <div class="header-content">
        <div class="container">
            <div class="col">
                <h1>Start your Journey</h1>
                <p>Based on cognitive-behavioural therapy (CBT), Mynd Journal is designed to help identify negative
                    thinking patterns and develop a more balanced perspective.
                </p>
                <a class="btn-secondary" href="{{ route('login') }}">Try It Now</a>
            </div>
            <div class="col">
                <img src="{{ asset('images/growth.png') }}" />
            </div>
        </div>
    </div>
</header>
<!-- About Information -->
<div class="section s1">
    <div class="container">
        <div class="col">
            <h1>About</h1>
            <p>Mynd Journal is a two part journaling app designed to help you develop new ways of relating to negative thoughts and 
            to experience a greater feeling of gratitude and thanks towards life. The skills that you will learn in the journaling
            process have been shown to help with mood problems associated with anxiety-related disorders and even have health benefits
            such as reducing stress. 
            </p>
            <p>The ideas in Mynd Journal come from cognitive-behavioural therapy (CBT), 
            one of today's most effective forms of psychotherapy. The cognitive model describes how people’s perceptions of, or spontaneous
            thoughts about situations influence their emotional, behavioural (and often physiological) reactions.
            </p>
        </div>
        <div class="col">
            <img src="{{ asset('images/cbt-triangle.png') }}" />
        </div>
    </div>
</div>
<!-- Thought Journal Information -->
<div class="section s2">
    <div class="container">
        <div class="col">
            <h1>Thought Journal</h1>
            <p>The Thought Journal will guide you through a step-by-step process to identify your thought or experience, 
                how it made you feel, and what unhelpful thinking patterns you might be engaging in. Most importantly, 
                it will teach you to challenge your thinking by adding a more balanced perspective on the thought or situation.
            </p>
            <p>

            </p>
        </div>
        <div class="col">
            <img src="{{ asset('images/tj_screenshot.jpg') }}" />
        </div>
    </div>
</div>
<!-- Gratitude Journal Information -->
<div class="section s3">
    <div class="container">
        <div class="col">
            <h1>Gratitude Journal</h1>
            <p>The Gratitude Journal works towards helping you build a greater sense of gratitude towards yourself and the world around you.
                It will ask you to identify strengths and qualities about yourself that you appreciate, as well as any external aspects of your
                life that you are grateful for. 
            </p>
            <p>Start now, keeping a gratitude journal can even have health benefits such as reducing stress levels!
            </p>
        </div>
        <div class="col">
            <img src="{{ asset('images/gj_screenshot.jpg') }}" />
        </div>
    </div>
</div>
@endsection