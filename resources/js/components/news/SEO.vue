<script setup>
const props = defineProps({
    name: { type: String },
    short_des: { type: String },
    title_go: { type: String },
    keyword_go: { type: String },
    slug: { type: String },
    des_go: { type: String },
});
</script>

<template lang="">
<div class="w-full bg-white p-3 rounded-md shadow-md my-3">
    <div class="title text-xl">
        Thông tin tin tức
    </div>
    <div class="w-full mt-3 flex flex-wrap">
        <div class="my-2 px-1 flex-1">
            <label for="name" class="text-sm mb-1">
                Tiêu đề
            </label>
            <input id="name" v-model="props.name" placeholder="Nhập tiêu đề" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-full mr-3" type="text" name="name">
        </div>
        <div class="my-2 w-full">
            <label for="short_des" class="text-sm mb-1">
                Mô tả ngắn
            </label>
            <textarea id="short_des" v-model="props.short_des" rows="5" name="short_des" placeholder="Nhập mô tả ngắn" class="resize-y rounded-md w-full outline-none border py-1 px-2 text-md max-w-full "></textarea>
        </div>
    </div>
    <div class="title text-xl">
        SEO
    </div>
    <div class="w-full mt-3 flex flex-wrap">
        <div class="my-2 px-1 flex-1">
            <label for="slug" class="text-sm mb-1">
                Slug URL
            </label>
            <input id="slug" v-bind:value="props.slug" placeholder="Nhập slug url" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-full mr-3" disabled type="text" name="slug">
        </div>
        <div class="my-2 px-1 flex-1">
            <label for="title_go" class="text-sm mb-1">
                Tiêu đề
            </label>
            <input id="title_go" v-model="props.title_go" placeholder="Nhập tiêu đề" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-full mr-3" type="text" name="title_go">
        </div>
        <div class="my-2 px-1 flex-1">
            <label for="keyword_go" class="text-sm mb-1">
                Keyword
            </label>
            <input id="keyword_go" v-model="props.keyword_go" placeholder="Nhập keyword" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-full mr-3" type="text" name="keyword_go">
        </div>
        <div class="my-2 w-full">
            <label for="des_go" class="text-sm mb-1">
                Description
            </label>
            <textarea id="des_go" v-model="props.des_go" rows="5" name="des_go" placeholder="Nhập description" class="resize-y rounded-md w-full outline-none border py-1 px-2 text-md max-w-full w-full mr-3">
            </textarea>
        </div>
    </div>
</div>
</template>
