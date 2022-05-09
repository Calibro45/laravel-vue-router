<template>
    <div>
        <header>
            <div class="none:container text-center bg-cyan-100 py-3 mb-32">
                <h1 class="text-6xl font-bold mb-10">Boolpress</h1>
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