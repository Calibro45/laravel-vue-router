<template>
    <div>
        <header>
            <div class="none:container text-center bg-cyan-100 py-3">
                <h1 class="text-7xl font-bold mb-10 text-black/80 tracking-widest uppercase">
                    Boolpress
                </h1>
                <nav>
                    <ol class="text-zinc-600 font-bold">
                        <router-link :to="{name: 'posts.index'}"
                        class="hover:bg-green-400 hover:rounded py-1 px-3">
                            Home
                        </router-link>
                    </ol>
                </nav>
            </div>
        </header>

        <main class="my-28">
            
            <slot/>

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

<style>
    
</style>