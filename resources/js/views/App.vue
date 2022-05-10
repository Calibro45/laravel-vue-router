<template>
    <div>
        <header>
            <div class="none:container text-center bg-cyan-100 py-3">
                <h1 class="text-6xl font-bold mb-10">Boolpress</h1>
                <nav>
                    <ol>
                        <router-link :to="{name: 'posts.index'}">Home</router-link>
                    </ol>
                </nav>
            </div>
        </header>

        <main class="my-28">

            <router-view></router-view>

        </main>

        <footer class="bg-emerald-300 mt-10">
            <div class="none:container py-5 px-3 flex items-center justify-between">
                <div>
                    &copy; Boolpress 2022
                </div>
                <div class="flex items-center gap-3">
                    <ol class="contents">
                        <li><i class="fab fa-facebook"></i></li>
                        <li><i class="fab fa-instagram"></i></li>
                        <li><i class="fab fa-youtube"></i></li>
                    </ol>
                </div>
            </div>
        </footer>

    </div>
</template>
<script>
export default {

}
</script>
<style lang="scss">
    
</style>