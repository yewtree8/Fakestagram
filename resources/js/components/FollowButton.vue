<template>
    <div class="pl-3 pt-2">
        <button class="btn-primary" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {

        props: ['userId', 'follows'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function(){
            return {
                status: this.follows,
            }
        },

        methods: {
            followUser(){
                axios.post('/follow/' + this.userId).then(response => {
                    console.log(response);
                })
            }
        },

        computed: {
            buttonText() {
                return(this.status) ? 'Unfollow' : 'Follow';
            }
        }

    }
</script>
