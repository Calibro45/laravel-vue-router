<template>
    <div class="post_wrap">
        <figure class="post-header">
            <img src="https://picsum.photos/450/300">
        </figure>

        <div class="post-body">
            <div>
                <h5 v-if="post.category">{{ post.category.name }}</h5>
                <h5 v-else>Nessuna Categoria</h5>

            </div>
            <div>
                <h4>{{ post.title }}</h4>
                <p>{{ post.content }}</p>
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