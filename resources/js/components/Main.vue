<template>
    <!-- Control Panel Main Content Template -->
    <div class="main-content" v-bind:style="{ 'width': width + '%' }">
        <slot></slot>
        <!-- Burger Icon -->
        <div id="mobile-nav" :class="{ 'active' : isBurgerActive }" @click.prevent="toggle(); changeWidth();">
            <button type="button" class="burger-button">
                <span class="burger-bar burger-bar-1"></span>
                <span class="burger-bar burger-bar-2"></span>
                <span class="burger-bar burger-bar-3"></span>
            </button>                           
        </div>
    </div>                 
</template>

<script> 
    import {store} from '../store.js';
    import {mutations} from '../store.js';

    export default {
        // Object variables 
        data() {
            return {
                width: 80
            }
        },
        computed: {
            // Returns value true meaning side bar is open
            isBurgerActive() {
                return store.isNavOpen
            }
        },
        methods: {
            // Toggles (opens/closes) side bar navigation
            toggle() {
                mutations.toggleNav()
            },
            // Changes width of main content based on whether side bar is open/closed
            changeWidth() {
                if (this.width == 80) {
                    this.width = 100;
                } else if (this.width == 100) {
                    this.width = 80;
                }
            }
        }
    }
</script>