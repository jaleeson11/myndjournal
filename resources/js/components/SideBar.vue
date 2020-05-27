<template>
    <!-- Side Bar Template -->
    <div id="sidebar">
        <transition name="slide">
            <div v-if="isPanelOpen" class="sidebar-panel">
                <slot></slot>
            </div>                                          
        </transition>               
    </div>              
</template>

<script>
    import {store} from '../store.js';
    import {mutations} from '../store.js';

    export default {
        methods: {
            closeSidebarPanel: mutations.toggleNav
        },
        computed: {
            // Returns value true meaning side bar is open
            isPanelOpen() {
                return store.isNavOpen
            }
        }
    }
</script>