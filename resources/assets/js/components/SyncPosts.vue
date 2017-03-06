<template>
    <button v-on:click="sync">
        Sync posts
    </button>
</template>

<script>
    import axios from 'axios';

    export default {
        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            sync() {
                console.log('Syncing posts with Contentful...');
                axios.post('/sync/posts')
                    .then(res => console.log(res))
                    .catch(err => console.error(err));
            }
        }
    }
</script>
