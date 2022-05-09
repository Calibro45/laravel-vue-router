<template>
    <div class="post_wrap">

        <PostCard v-for="post in posts" :key="post.id" :post="post"/>

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