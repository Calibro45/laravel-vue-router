<template>
    <div class="container">
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

            <PostCard v-for="post in posts" :key="post.id" :post="post"/>

        </div>
    </div>
</template>

<script>
import PostCard from '../components/PostsCard.vue';

export default {
    components : {
        PostCard,
    },
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