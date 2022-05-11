<template>
    <LayoutBase>
        <section v-if="loading">
            <div class="container">

                <div class="mb-6 flex items-center gap-3 font-medium">
                    <h5 v-if="post.category" class="uppercase text-sm tracking-widest flex-auto">
                        Categoria: {{ post.category.name }}
                    </h5>
                    <span v-for="tag in post.tags" :key="tag.slug"
                    class="text-xs py-1 px-2 rounded-full whitespace-nowra bg-gradient-to-r from-emerald-300 to-cyan-200">
                        {{tag.name}}
                    </span>
                </div>

                <figure class="rounded-lg overflow-hidden mb-6 h-80">
                    <img src="https://picsum.photos/1080/720" class="object-cover object-center h-full w-full">
                </figure>

                <div class="text-zinc-600 mb-8 bg-cyan-50 shadow-lg">
                    <h1 class="font-bold uppercase text-xl py-2 px-4">{{ post.title }}</h1>
                </div>

                <div class="text-zinc-500 font-medium">
                    <p class="text-md leading-6 tracking-wide">{{ post.content }}</p>
                </div>

            </div>
        </section>
    </LayoutBase>
</template>

<script>
import LayoutBase from '../layouts/LayoutBase.vue';
export default {
    components: {
        LayoutBase
    },
    beforeMount() {
        //console.log(this.slug)
        this.fetchPost();
    },
    data() {
        return {
            slug: this.$route.params.slug,
            post: null,
            loading: false
        }
    },
    methods: {
        fetchPost() {
            axios.get(`/api/posts/${this.slug}`)
                .then(res => {
                    const {post} = res.data;
                    this.post = post;
                    this.loading = true;
                    //console.log(post);
                })
                .catch(err => {
                    this.$router.push({name: 'error'});
                })
        }
    }
}
</script>

<style>
    
</style>