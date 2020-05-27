<template>
    <!-- Modal Template -->
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <button type="button" class="close-modal" @click="$emit('close'); scrollToTop();">
                        <i class="fas fa-times"></i>    
                    </button>
                    <div class="modal-header">
                        <slot name="header">
                            default header
                        </slot>
                    </div>

                    <div class="modal-body">
                        <slot name="body">
                            default body
                        </slot>
                    </div>

                    <div class="modal-footer">
                        <slot name="footer">
                            <button type="button" class="btn-primary btn-modal" @click="$emit('close'); scrollToTop();">
                                Ok, got it!
                            </button>
                        </slot>
                    </div>
                </div>                          
            </div>                      
        </div>                     
    </transition>               
</template>

<script>

export default {
    name: 'modal',
    // Object variables
    data() {
        return {
            showModal: false
        }
    },
    // Scrolls to top
    methods: {           
        scrollToTop() {
            window.scrollTo(0,0);
        }           
    }
}

</script>