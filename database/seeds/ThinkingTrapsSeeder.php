<?php

use Illuminate\Database\Seeder;

class ThinkingTrapsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('thinking_traps')->insert(
            [
                [
                    'tt_name' => 'Fortune Telling',
                    'tt_description' => 'This is when we predict that things will turn out
                    badly. But, in reality, we cannot predict the future
                    because we don\'t have a crystal ball!',
                    'tt_image' => file_get_contents('public/images/thinking-traps/fortune-teller.png'),
                ],
                [
                    'tt_name' => 'Black and White Thinking',
                    'tt_description' => 'This is when we only look at situations in terms of
                    extremes. For example, things are either good or
                    bad, a success or a failure. But, in reality, most
                    events call for a more "moderate" explanation.
                    For example, cheating once on your diet does not
                    mean you have failed completely. You had a
                    small setback, and all you need to do is to get
                    back on your diet tomorrow.',
                    'tt_image' => file_get_contents('public/images/thinking-traps/black-and-white-thinking.png'),
                ],
                [
                    'tt_name' => 'Mind Reading',
                    'tt_description' => 'This trap happens when we believe that we know
                    what others are thinking and we assume that they
                    are thinking the worst of us. The problem is that
                    no one can read minds, so we don\'t really know
                    what others are thinking!',
                    'tt_image' => file_get_contents('public/images/thinking-traps/mind-reading.png'),
                ],
                [
                    'tt_name' => 'Over Generalising',
                    'tt_description' => 'This is when we use words like "always" or
                    "never" to describe situations or events. This type
                    of thinking is not helpful because it does not take
                    all situations or events into account. For
                    example, sometimes we make mistakes, but we
                    don\'t always make mistakes.',
                    'tt_image' => file_get_contents('public/images/thinking-traps/over-generalizing.png'),
                ],
                [
                    'tt_name' => 'Over Estimating Danger',
                    'tt_description' => 'This is when we believe that something that is
                    unlikely to happen is actually right around the
                    corner. It\'s not hard to see how this type of
                    thinking can maintain your anxiety. For example,
                    how can you not feel scared if you think that you
                    could have a heart attack any time?',
                    'tt_image' => file_get_contents('public/images/thinking-traps/over-estimating-danger.png'),
                ],
                [
                    'tt_name' => 'Negative Filter',
                    'tt_description' => 'This happens when we only pay attention to the
                    bad things that happen, but ignore all the good
                    things. This prevents us from looking at all
                    aspects of a situation and drawing a more
                    balanced conclusion.',
                    'tt_image' => file_get_contents('public/images/thinking-traps/negative-filter.png'),
                ],
                [
                    'tt_name' => 'Catastrophising',
                    'tt_description' => 'This is when we imagine that the worst possible
                    thing is about to happen, and predict that we
                    won\'t be able to cope with the outcome. But, the
                    imagined worst-case scenario usually never
                    happens and even if it did, we are most likely
                    able to cope with it.',
                    'tt_image' => file_get_contents('public/images/thinking-traps/catastrophizing.png'),
                ],
                [
                    'tt_name' => 'Should Statements',
                    'tt_description' => 'This is when you tell yourself how you "should",
                    "must", or "ought" to feel and behave. However,
                    this is NOT how you actually feel or behave. The
                    result is that you are constantly anxious and
                    disappointed with yourself and/or with others
                    around you.',
                    'tt_image' => file_get_contents('public/images/thinking-traps/should-statements.png'),
                ],
            ]
        );
    }
}
