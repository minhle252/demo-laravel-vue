<template>
    <form @submit.prevent="submitForm" class="w-full h-screen overflow-y-auto px-5">
        <Header title="Chỉnh sửa bài viết" />
        <div class="flex flex-wrap">
            <ListCategories v-model:selectedCategory="selectedCategory"/>
            <div class="w-9/12">
                <Info :initialImageUrl="currentData.images" />
                <SEO v-model:name="currentData.name" v-model:short_des="currentData.short_des"
                    v-model:title_go="currentData.title_go" v-model:keyword_go="currentData.keyword_go"
                    v-model:slug="currentData.slug" v-model:des_go="currentData.des_go" />
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
import { ref, onMounted } from 'vue';
import { useToast } from 'vue-toast-notification';
import { useRoute } from 'vue-router';
export default {
    setup() {
        const selectedCategory = ref(1);
        const currentData = ref({
            name: "",
            short_des: "",
            title_go: "",
            keyword_go: "",
            slug: "",
            des_go: "",
            images: "",
            cayegory_id: 1,
        })
        const des = ref('');
        const toast = useToast();
        const route = useRoute();
        const id = route.params.id;
        onMounted(() => {
            
            axios.get(`/api/news/${id}`)
                .then(response => {
                    // Assuming response contains the data you need
                    const { data, message } = response.data;
                    currentData.value = data;
                    selectedCategory.value = data?.category_id;
                    des.value = data.des;
                    toast.success(message);
                })
                .catch(error => {
                    console.log(error);
                    const message = error.response?.data?.message || 'An error occurred';
                    toast.error(message);
                });
        });
8        // Submit form to update the news
        const submitForm = (event) => {
            const data = {
                name: event.target.name?.value,
                short_des: event.target.short_des?.value,
                title_go: event.target.title_go?.value,
                keyword_go: event.target.keyword_go?.value,
                des_go: event.target.des_go?.value,
                slug: event.target.slug?.value,
                images: event.target.images?.value,
                des: des.value, // Bind description from editor
                category_id: Number(event.target.cate?.value),
            };
            axios.put(`/api/news/${id}`, data) // Use PUT to update the news
                .then(response => {
                    const { message } = response.data;
                    toast.success(message);
                })
                .catch(error => {
                    const { message } = error.response?.data || { message: 'Something went wrong' };
                    toast.error(message);
                });
        };
        return {
            des,
            currentData,
            selectedCategory,
            submitForm
        };
    },
    components: {
        ListCategories,
        Info,
        SEO,
        Editors,
        Header
    },
};
</script>

<style scoped>
h1 {
    color: #42b983;
}
</style>
