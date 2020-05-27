<template>
    <!-- Tab Content Template -->
    <div v-show="isActive"><slot></slot></div>
</template>

<script>
    export default {
        name: 'tab',
        // Props
        props: {
            name: {required:true},
            selected: {default:false}
        },
        // Object variables
        data() {
            return {
                isActive:false
            }
        },
        
        created() {
            this.isActive = this.selected
        }
    }

</script>