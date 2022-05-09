<template>
    <div>
        
    </div>
</template>

<script>
export default {
    data() {
        return {
            posts: [],
        }
    },
    methods: {
        fetchPosts() {
            axios.get('/api/posts')
                .then(res => {
                    const {posts} = res.data;
                    this.posts = posts;
                })
                .catch(err => {
                    console.warn(err);
                })
        }
    },
    created() {
        this.fetchPosts();
    },
}
</script>

<style lang="scss">
    
</style>