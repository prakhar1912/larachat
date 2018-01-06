<template>
    <div>
        <h1>{{ this.user }}</h1>
        <p>{{ this.message }}</p>
    </div>
</template>

<script>
    export default {
        data(){
            return {

            }
        },
        props: ['user','message']
    }
</script>
