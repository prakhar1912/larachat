<template>
    <input class="form-control" id="new-message" placeholder="type new message here" v-model="message" @keyup.enter="submit">
</template>

<script>
    export default {
        data(){
            return {
                message: ''
            }
        },
        methods: {
            submit(){
                let message = this.message;
                $.ajax({
                    url: '/message/send',
                    method: 'POST',
                    data:{
                        message: message
                    }
                }).done(response => {
                    if(response){
                        this.message = '';
                    }
                });
            }
        }
    }
</script>
