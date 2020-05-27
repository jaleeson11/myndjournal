<template>
    <form-wizard>
        <!-- Thought Journal Entry Content -->
        <template v-slot="{formData}">            
            <form method="POST" action="/thoughtjournal/submit">
                <input type="hidden" name="_token" :value="csrf">
                <!-- Situation -->
                <tab-content name="Situation" :selected="true" :formData="formData" v-bind:value="csrf">
                    <h2>What's worrying you right now and why?</h2>
                    <p>Describe the situation and why you're worried about it. Be as specific as you can
                    with your reasoning.</p>
                    <p class="example-block">e.g. There's a science test on Monday. I know for sure I'll get a zero and that people
                    will laugh. Maybe I'll fail the class.</p>
                    <textarea name="situation_entry" v-model="formData.situation_entry"></textarea>
                    <!-- Introductory Modal -->          
                    <modal v-if="modal1" @close="modal1=false">
                        <h1 slot="header"><i class="fas fa-book"></i>Thought Journal</h1>
                        <p slot="body">Keeping a Thought Journal is a great way of understanding and changing your negative
                        thought patterns. It helps you realise when you're trapped in unhelpful ways of thinking and guides
                        you to identify a more balanced perspective. Use the thought journal whenever you're feeling anxious
                        or worried about something.<br /><br />e.g. You may be thinking about sleep tonight, worrying that if you don't
                        get a good nights rest the next day will be ruined. Assuming that
                        the next day is going to go badly only fuels your anxiety. Instead it's important to realise that
                        you're fortune-telling (predicting the future). A more helpful way of thinking would be to remind yourself
                        that you don't know what's going to happen. Chances are you'll probably sleep better than you think.</p>
                    </modal> 
                </tab-content>
                <!-- Emotions -->
                <tab-content name="Emotions">
                    <h2>Please select up to three emotions you experienced in the situation you described</h2>
                    <p class="entry-text"><i class="far fa-comments"></i>{{ formData.situation_entry }}</p>
                    <label v-for="emotion in emotions" class="cb-container">
                        <p>{{ emotion.em_name }}</p>
                        <img :src="emotion.em_image" />
                        <input name="emotions[]" type="checkbox" :value="emotion.id" v-model="formData.emotions">
                        <span class="checkmark"></span>
                    </label>
                </tab-content>
                <!-- Automatic Thoughts -->
                <tab-content name="Thoughts">
                    <h2>What was going through your mind?</h2>
                    <p class="entry-text"><i class="far fa-comments"></i>{{ formData.situation_entry }}</p>
                    <p>Identify anything that went through your mind in the situation you described. List up to 5 thoughts.</p>
                    <p class="example-block">e.g. Everyone will be disappointed in me if I fail this test. I should be more like
                    the other students.</p>
                    <div class="form-group form-inline">
                        <label>1</label>
                        <input name="thoughts[]" v-model="formData.thoughts[0]" type="text">
                    </div>
                    <div class="form-group form-inline">
                        <label>2</label>
                        <input name="thoughts[]" v-model="formData.thoughts[1]" type="text">
                    </div>
                    <div class="form-group form-inline">
                        <label>3</label>
                        <input name="thoughts[]" v-model="formData.thoughts[2]" type="text">
                    </div>
                    <div class="form-group form-inline">
                        <label>4</label>
                        <input name="thoughts[]" v-model="formData.thoughts[3]" type="text">
                    </div>
                    <div class="form-group form-inline">
                        <label>5</label>
                        <input name="thoughts[]" v-model="formData.thoughts[4]" type="text">
                    </div>
                </tab-content>
                <!-- Thinking Traps -->
                <tab-content name="Thinking Traps">                   
                    <h2>Please select up to three thinking traps that are associated with your thoughts</h2>
                    <ul class="entry-text">
                        <li>{{ formData.thoughts[0] }}</li>
                        <li>{{ formData.thoughts[1] }}</li>
                        <li>{{ formData.thoughts[2] }}</li>
                        <li>{{ formData.thoughts[3] }}</li>
                        <li>{{ formData.thoughts[4] }}</li>
                    </ul>
                    <label v-for="thinkingTrap in thinkingTraps" class="cb-container">
                        <p>{{ thinkingTrap.tt_name }}</p>
                        <img :src="thinkingTrap.tt_image" />
                        <input name="thinking_traps[]" type="checkbox" :value="thinkingTrap.id">
                        <span class="checkmark"></span>
                    </label>
                    <!-- Thinking Traps Modal -->
                    <modal v-if="modal2" @close="modal2=false">
                        <h1 slot="header">Thinking Traps</h1>
                        <ul slot="body">
                            <div class="alert-box info">
                                <h2><i class="fas fa-info-circle"></i>Identify</h2>
                                <p>Once you can identify your unhelpful thinking patterns
                                it becomes much easier to notice them. This will help
                                you to challenge or distance yourself from those thoughts
                                and hopefully change your perspective on them. Below are 
                                a list of common thinking traps that we can sometimes
                                fall into.</p>
                            </div>
                            <li class="modal-tt" v-for="thinkingTrap in thinkingTraps">
                                <div class="modal-tt-img">
                                    <img :src="thinkingTrap.tt_image" />
                                </div>
                                <div class="modal-tt-desc">
                                    <h3>{{ thinkingTrap.tt_name }}</h3>
                                    <p>{{ thinkingTrap.tt_description }}</p>
                                </div>
                            </li>
                        </ul>               
                    </modal>                 
                </tab-content>
                <!-- Balanced Thought -->
                <tab-content name="Balance Thought">
                    <h2>Alternative/Balanced Thoughts</h2>
                    <ul class="entry-text">
                        <li>{{ formData.thoughts[0] }}</li>
                        <li>{{ formData.thoughts[1] }}</li>
                        <li>{{ formData.thoughts[2] }}</li>
                        <li>{{ formData.thoughts[3] }}</li>
                        <li>{{ formData.thoughts[4] }}</li>
                    </ul>
                    <p>Balanced thoughts are a way of putting negative, anxious or self-critical thoughts
                    into perspective. Looking at your thoughts write an alternative or balanced thought below.</p>
                    <p class="example-block">e.g. Even though I am in a lot of pain right now, talking to somebody who cares might help
                    me feel better, it has in the past.</p>
                    <textarea name="balanced_thought" v-model="formData.balanced_thought"></textarea> 
                    <div class="submit-wrapper">
                        <button type="submit" class="btn-primary btn-submit"><i class="fas fa-plus-circle"></i>Add New Entry</button>               
                    </div>
                </tab-content>
            </form>
        </template>
    </form-wizard>
</template>

<script>
    export default {
        // Object variables
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'), 
                modal1: true,
                modal2: true,
                emotions: [],
                thinkingTraps: []
            }
        },
        created() {
            // HTTP request to return emotions data
            axios.get('/thoughtjournal/emotions').then(response => {
                this.emotions = response.data;
                console.log(response);
            });
            // HTTP request to return thinking traps data
            axios.get('/thoughtjournal/thinkingtraps').then(response => {
                this.thinkingTraps = response.data;
                console.log(response);
            });
        },
        methods: {  
            // Scrolls to top of window         
            scrollToTop() {
                window.scrollTo(0,0);
            }           
        }
    }
</script>
