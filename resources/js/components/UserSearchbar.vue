<template>
    <div>
        <input type="text" placeholder="Search" v-model="query">
        <ul v-if="results.length > 0 && query">
            <li v-for="result in results.slice(0,10)" :key="result.id">
                <a :href="result.url">
                    <div v-text="result.title"></div>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {


        mounted() {
            console.log('Component mounted.')
        },

        data() {
            return {
                query: null,
                results: []
            };
        },
        watch: {
            query(after, before) {
                this.searchMembers();
            }
        },
        methods: {
            searchMembers() {
                axios.get('/profile/search', { params: { query: this.query } })
                    .then(response => this.results = response.data)
                    .catch(error => {});
            }
        }

    }
</script>
