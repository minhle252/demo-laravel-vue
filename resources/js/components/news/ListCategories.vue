<template lang="">
<div class="w-3/12 pr-2">
    <div class="w-full bg-white p-3 rounded-md shadow-md mt-3 sticky top-0">
        <div class="title text-xl">Danh mục tin tức</div>
        <div class="box_category flex flex-col pt-2" style="height: 400px;">
            <div v-for="cate in props.categories" :key="cate.id" class="w-full max-w-full p-2 flex border-b hover:bg-gray-200">
                <input :id="'check_' + cate.id" class="mr-2 max-w-full" type="radio" :value="cate.id" v-model="props.selectedCategory" name="cate" />
                <label :for="'check_' + cate.id" class="text-sm">
                    {{ cate.name }}
                </label>
            </div>
        </div>
    </div>
</div>
</template>

<script setup>
const props = defineProps({
    categories: {
        type: Array,
        default: () => [{
                    id: 1,
                    name: "Cẩm nang"
                },
                {
                    id: 2,
                    name: "Thời trang"
                },
                {
                    id: 3,
                    name: "Chia sẻ"
                },
            ],
    },
    selectedCategory: {
        type: [String, Number],
        default: 1,
    },
});

</script>

