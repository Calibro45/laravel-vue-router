<template>
    <div>
        <header>
            <nav>
                <ol>
                    <li>Home</li>
                    <li>Post</li>
                </ol>
            </nav>
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