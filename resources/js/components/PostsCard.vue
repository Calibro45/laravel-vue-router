<template>

    <div class="post_wrap p-1.5">
        <figure class="post-header rounded-lg overflow-hidden mb-3.5 h-48">
            <img class="object-cover h-full" src="https://picsum.photos/650/300">
        </figure>

        <div class="post-body mb-3.5 text-zinc-600 font-bold text-center">
            <div class="mb-3 bg-cyan-50 flex items-center flex-wrap gap-2 py-2 px-4 shadow-lg">
                <h5 v-if="post.category" class="uppercase text-sm tracking-widest flex-auto">
                    {{ post.category.name }}
                </h5>
                <div class="flex gap-1">
                    <span v-for="tag in post.tags" :key="tag.id"
                    class="text-xs py-1 px-2 rounded-full whitespace-nowra bg-gradient-to-r from-emerald-300 to-cyan-200">
                        {{ tag.name }}
                    </span>
                </div>
            </div>
            <div>
                <h4 class="capitalize text-left">{{ post.title }}</h4>
            </div>
        </div>

        <div class="post-footer text-sm text-zinc-600">
            <router-link tag="button" :to="{name: 'posts.show', params: {slug: post.slug}}"
            class="rounded bg-green-400 py-2 px-4 font-medium">
                Per saperne di più
            </router-link>
        </div>
    </div>

</template>

<script>
export default {
    props: {
        post: {
            type: Object
        }
    }
}
</script>

<style lang="">
    
</style>