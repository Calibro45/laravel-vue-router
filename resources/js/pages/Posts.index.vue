<template>
    <div class="container">
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-4 gap-y-6 mb-10">

            <PostCard v-for="post in posts" :key="post.id" :post="post"/>

        </div>

        <div>
            <ol class="flex items-center justify-center gap-3">
                <li v-for="n in 5" :key="n"
                @click="fetchPosts(n)"
                :class="['select-none cursor-pointer w-8 h-8 flex items-center justify-center rounded-full', 
                n === currPage ? 'bg-cyan-200' : '']">
                    {{ n }}
                </li>
            </ol>
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
            currPage: 1,
            lastPage: 0,
        }
    },
    methods: {
        fetchPosts(page = 1) {
            axios.get('/api/posts', {
                params: {
                    page
                }
            })
                .then(res => {
                    const {posts} = res.data;
                    const { data, current_page, last_page} = posts;
                    this.posts = data;
                    this.currPage = current_page;
                    this.lastPage = last_page;
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