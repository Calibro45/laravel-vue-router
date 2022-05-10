<template>
    <section v-if="loading">
        <div class="container">

            <figure>
                <img src="https://picsum.photos/1080/720" alt="">
            </figure>

            <div>
                <h1>{{ post.title }}</h1>
            </div>

            <div>
                <p>{{ post.content }}</p>
            </div>

        </div>
    </section>
</template>

<script>
export default {
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