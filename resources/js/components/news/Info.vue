<template>
<div class="w-full bg-white p-3 rounded-md shadow-md mt-3">
    <div class="title text-xl">Hình ảnh đại diện</div>
    <label for="file-upload-image" class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 ">
        <img v-if="imageUrl || this.initialImageUrl" width="100" height="100" decoding="async" data-nimg="1" class="w-full h-auto" :src="imageUrl || this.initialImageUrl" style="color: transparent;">
        <div v-else class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon" class="mx-auto h-12 w-12 text-gray-300">
                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z">
                </path>
            </svg>
            <div class="mt-4 flex text-sm leading-6 text-gray-600">
                <div class="relative cursor-pointer rounded-md bg-white font-semibold text-[--primary] focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                    <span>Upload a file</span>
                </div>
                <p class="pl-1">or drag and drop</p>
            </div>
            <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB {{ imageUrl }}</p>
        </div>
        <input id="file-upload-image" @change="uploadImage" name="file-upload" type="file" class="sr-only">
        <input type="hidden" name="images" :value="imageUrl || this.initialImageUrl">
    </label>
</div>
</template>

<script>
import axios from 'axios';
import { useToast } from 'vue-toast-notification';

export default {
    props: {
        initialImageUrl: {
            type: String,
        },
    },
    data() {
        return {
            imageUrl: this.initialImageUrl,
        };
    },
    onMounted() {
        this.imageUrl = this.initialImageUrl;
    },
    methods: {
        async uploadImage(event) {
            console.log('this.initialImageUrl');
            console.log(this.initialImageUrl);
            console.log(this.imageUrl);

            const toast = useToast();
            const file = event.target.files[0];
            if (!file) return;
            const formData = new FormData();
            formData.append('image', file);

            try {
                const response = await axios.post('/api/news/upload', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                });
                const { message, data } = response.data;
                this.imageUrl = data.path;
                toast.success(message);
            } catch (error) {
                const { message } = error.response?.data || { message: 'Something went wrong' };
                console.error(error);
                toast.error(message);
            }
        },
    },
};
</script>
