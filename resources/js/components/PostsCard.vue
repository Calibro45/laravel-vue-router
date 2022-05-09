<template>

    <div class="post_wrap p-1.5">
        <figure class="post-header rounded-lg overflow-hidden mb-3.5">
            <img class="object-cover" src="https://picsum.photos/650/300">
        </figure>

        <div class="post-body mb-3.5">
            <div class="mb-3">
                <h5 v-if="post.category">{{ post.category.name }}</h5>
                <h5 v-else>Nessuna Categoria</h5>
            </div>
            <div>
                <span v-for="tag in post.tags" :key="tag.id">{{ tag.name }}</span>
            </div>
            <div>
                <h4>{{ post.title }}</h4>
            </div>
        </div>

        <div class="post-footer">
            <button>Read full article</button>
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