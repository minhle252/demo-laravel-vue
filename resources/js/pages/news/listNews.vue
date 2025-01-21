<template lang="">
    <div class="w-full">
        <div class="w-full flex justify-between items-center my-3">
            <div class="title text-xl">Danh sách tin tức</div>
            <router-link to="/admin/news/create" class="py-1 px-2 rounded-lg border">Create</router-link>
        </div>
        <AgTable :columnDefs="columnDefs" :rowData="rowData" @reloadData="reloadData" ref="agTable" />
    </div>
</template>

<script>
import AgTable from '../../components/news/AgTable.vue';
import { ref, onMounted } from 'vue';
import { useToast } from 'vue-toast-notification';
import axios from 'axios';
export default {
    components: {
        AgTable,
        CustomButtonComponent: {
            template: `
                <div>
                    <a :href="getEditUrl" class="py-1 px-2 rounded-lg border" >Edit</a>
                    <button @click="deleteFunc" class="py-1 px-2 rounded-lg border ms-2">Delete</button>
                </div>
            `,
            props: ['params'],
            computed: {
                getEditUrl() {
                    return `/admin/news/${this.params.value}`;
                },
            },
            methods: {
                async deleteFunc() {
                    const toast = useToast();
                    const rowData = this.params.value; 
                    try {
                        const response = await axios.delete(`/api/news/${rowData}`);
                        const {  message } = response.data;
                        toast.success(message);
                        window.location.reload()
                    } catch (error) {
                        console.log(error);
                        const message = error.response?.data?.message || 'An error occurred';
                        toast.error(message);
                    }

                },

            },
        },

    },
    setup() {
        const columnDefs = ref([
            { field: "id", headerName: "ID", },
            {
                field: "images", headerName: "Images", filter: false, cellRenderer: (params) => {
                    const img = document.createElement('img');
                    img.src = params.value;
                    img.style.width = '100px';
                    img.style.height = '100px';
                    return img;
                },
            },
            { field: "name", headerName: "Name" },
            { field: "short_des", headerName: "Short Description" },
            {
                field: "id", headerName: "Action", cellRenderer: "CustomButtonComponent",
            }
        ])
        const rowData = ref([]);
        const reloadData = async () => {
            console.log('reloadData');

            try {
                const response = await axios.get('/api/news');
                rowData.value = response.data;
            } catch (error) {
                console.error('Error fetching news data:', error);
            }
        };
        onMounted(async () => {
            reloadData();
        });
        return {
            columnDefs,
            rowData,
            reloadData,
        }
    }
}
</script>
