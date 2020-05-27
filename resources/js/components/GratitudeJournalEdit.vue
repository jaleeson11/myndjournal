<template>
    <form-wizard>
        <!-- Gratitude Journal Edit Entry Content -->
        <template v-slot="{formData}">            
            <form method="POST" :action="'/gratitudejournal/' + gjEntry.id + '/update'">
                <input type="hidden" name="_token" :value="csrf">
                <!-- Day Ratings -->
                <tab-content name="Day Rating" :selected="true" :formData="formData" v-bind:value="csrf">
                    <h2>How was your day today?</h2>
                    <p>Give your day a rating from the options below</p>
                    <div class="day-rating">
                        <label v-for="dayRating in dayRatings" :class="{'is-selected': ((value >= dayRating.id) && value != null), 'is-disabled': disabled}" 
        v-on:click="set(dayRating.id)" v-on:mouseover="rating_over(dayRating.id)" v-on:mouseout="rating_out">
                            <input class="day-rating day-rating__checkbox" type="radio" :value="dayRating.id" name="day_ratings[]"
        v-model="value" :disabled="disabled">
                            <img :src="dayRating.dr_image" />
                            <p>{{ dayRating.dr_name }}</p>
                        </label>
                    </div>       
                </tab-content>
                <!-- Self Gratitudes --> 
                <tab-content name="Self Gratitude"> 
                    <h2>Gratitude about Yourself</h2>
                    <p>List up to 5 things about yourself that you are grateful for and appreciate. These can include
                    qualities, strengths, values, good deeds, etc.</p>
                    <p class="example-block">e.g. I am grateful for my ability to help others</p>
                    <div class="form-group form-inline">
                        <label>1</label>
                        <input name="self_gratitudes[]" type="text">
                    </div>
                    <div class="form-group form-inline">
                        <label>2</label>
                        <input name="self_gratitudes[]" type="text">
                    </div>
                    <div class="form-group form-inline">
                        <label>3</label>
                        <input name="self_gratitudes[]" type="text">
                    </div>
                    <div class="form-group form-inline">
                        <label>4</label>
                        <input name="self_gratitudes[]" type="text">
                    </div>
                    <div class="form-group form-inline">
                        <label>5</label>
                        <input name="self_gratitudes[]" type="text">
                    </div>
                </tab-content>
                <!-- Life Gratitudes -->
                <tab-content name="Life Gratitude">
                    <h2>Gratitude about the World and Life</h2>
                    <p>Please select up to three things that you are grateful for and appreciate today.</p>
                    <label v-for="lifeGratitude in lifeGratitudes" class="cb-container">
                        <p>{{ lifeGratitude.lgr_name }}</p>
                        <img :src="lifeGratitude.lgr_image" />
                        <input name="life_gratitudes[]" type="checkbox" :value="lifeGratitude.id">
                        <span class="checkmark"></span>
                    </label>
                    <div class="submit-wrapper">
                        <button class="btn-primary btn-submit"><i class="fa fa-pencil" aria-hidden="true"></i>Update Entry</button>
                    </div>
                </tab-content>
            </form>
        </template>
    </form-wizard>
</template>

<script>
    export default {
        // Props
        props: [
            'value',
            'disabled',
            'test',
        ],
        // Object variables
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'), 
                modal1: true,
                dayRatings: [],
                lifeGratitudes: [],
                gjEntry:[],
            }
        },
        mounted() {
            this.created();
        },
        computed: {
            // Returns route of journal entry that is being edited
            computedAction() {
                return '/gratitudejournal/${test}$/update'
            }
        },
        created() {
            // HTTP request to return day ratings data
            axios.get('/gratitudejournal/dayratings').then(response => {
                this.dayRatings = response.data;
                console.log(response);
            });
            // HTTP request to return life gratitudes data
            axios.get('/gratitudejournal/lifegratitudes').then(response => {
                this.lifeGratitudes = response.data;
                console.log(response);
            });
            // HTTP request to return journal entry data
            axios.get('/gratitudejournal/' + this.test + '/get').then(response => {
                this.gjEntry = response.data;
                console.log(response);
            });
        },
        methods: {  
            // Scrolls to top of window       
            scrollToTop() {
                window.scrollTo(0,0);
            },
            
            // Selects day rating 
            rating_over: function(index) {
                var self = this;

                if (!this.disabled) {
                    this.temp_value = this.value;
                    return this.value = index;
                }
            },

            // Deselects day rating
            rating_out: function() {
                var self = this;

                if (!this.disabled) {
                    return this.value = this.temp_value;
                }
            },

            // Sets day rating as selected value
            set: function(value) {
                var self = this;

                if (!this.disabled) {
                    this.temp_value = value;
                    return this.value = value;
                }
            }              
        }
    }
</script>
