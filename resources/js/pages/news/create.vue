<template>
    <form @submit.prevent="submitForm" class="w-full h-screen overflow-y-auto px-5">
        <Header title="Chỉnh sửa bài viếtss " />
        <div class="flex flex-wrap">
            <ListCategories />
            <div class="w-9/12">
                <Info />
                <SEO />
            </div>
            <div class="w-full">
                <Editors v-model="des" />
            </div>
        </div>
    </form>
</template>

<script>
import Header from '../../components/layouts/Header.vue';
import Editors from '../../components/news/Editors.vue';
import Info from '../../components/news/Info.vue';
import ListCategories from '../../components/news/ListCategories.vue';
import SEO from '../../components/news/SEO.vue';
import axios from 'axios';
import { ref } from 'vue';
import { useToast } from 'vue-toast-notification';

export default {
    data() {
        return {
            des: ref('')
        };
    },
    components: {
        ListCategories,
        Info,
        SEO,
        Editors,
        Header
    },
    methods: {
        submitForm(event) {
            const toast = useToast();
            const data = {
                name: event.target.name?.value,
                short_des: event.target.short_des?.value,
                title_go: event.target.title_go?.value,
                keyword_go: event.target.keyword_go?.value,
                des_go: event.target.des_go?.value,
                slug: event.target.slug?.value,
                images: event.target.images?.value,
                des: this.des,
                category_id: Number(event.target.cate?.value),
            }
            axios.post('/api/news', data)
                .then(response => {
                    const { message } = response.data;
                    toast.success(message)
                })
                .catch(error => {
                    const { message } = error.response.data;
                    toast.error(message)
                });
        }
    }
};
</script>

<style scoped>
h1 {
    color: #42b983;
}
</style>
