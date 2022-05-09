<template>
    <div>
        <header>
            <div class="none:container text-center">
                <h1>Boolpres</h1>
            </div>
        </header>

        <main>

            <PostsGrid />

        </main>

        <footer>
            che bel footer
        </footer>

    </div>
</template>
<script>
import PostsGrid from './Posts.index.vue';
export default {
    components: {
        PostsGrid,
    }
}
</script>
<style lang="scss">
    
</style>