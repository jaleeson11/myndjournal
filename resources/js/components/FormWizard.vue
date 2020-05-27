<template>
    <!-- Entry Form Template -->
    <div id="entry-form">
        <!-- Form Steps -->
        <ul class="steps has-content-centered">
            <li class="steps-segment" v-for="tab in tabs" :class="{ 'is-active': tab.isActive }" v-bind:key="tab.name">
                <span class="steps-marker"></span>
                <div class="steps-content">
                    <p>{{tab.name}}</p>
                </div>
            </li>
        </ul>
        <div id="j-form">
            <!-- Form Content -->
            <div class="tab-details">
                <slot :formData="formData"></slot>
            </div> 
            <!-- Form Controls -->
            <div class="control-wrapper">
                <div class="control">
                    <div v-if="currentActive > 0">
                        <button @click="previousTab(); scrollToTop()" class="btn-primary prev">Previous</button>
                    </div>
                    <div v-if="currentActive < totalTabs-1">
                        <button @click="nextTab(); scrollToTop()" class="btn-primary next">Next</button>
                    </div>
                </div>
            </div> 
        </div>     
    </div>                     
</template>

<script>
    export default {
        name: 'form-wizard',
        // Object variables
        data() {
            return {
                tabs: [],
                currentActive: 0,
                totalTabs: 0,
                showModal: false,
                formData: {
                    situation_entry: '',
                    emotions: [],
                    thoughts: [],
                    balanced_thought: '',
                }
            }
        },

        created() {
            this.tabs = this.$children;
        },

        mounted() {
            this.totalTabs = this.tabs.length;
        },

        methods: {      
            // Navigates to previous tab
            previousTab() {
                this.currentActive--;
                this.tabs.forEach(tab => {
                    tab.isActive = false;
                })
                this.tabs[this.currentActive].isActive = true;
            },
            // Navigates to next tab
            nextTab() {
                //Validate input
                this.$root.$validator.validate('step'+ (this.currentActive + 1) + '.*').then(valid => {
                    if (valid) { 
                        this.currentActive++;
                        this.tabs.forEach(tab => {
                            tab.isActive = false;
                        })
                        this.tabs[this.currentActive].isActive = true;           
                    }   
                });
            },
            // Scrolls to top of window
            scrollToTop() {
                window.scrollTo(0,0);
            }
        
        }
    }

</script>