<template lang="">
<div class="flex justify-between px-2 py-3 bg-gray-300 mb-2 rounded-md my-5">
    <h1>{{title}}</h1>
    <div class="flex">
        <a class="flex btn text-gray-500 hover:text-sky-800 mx-2 items-center" href="/admin/news">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="rotate-left" class="svg-inline--fa fa-rotate-left size-4 me-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M48.5 224H40c-13.3 0-24-10.7-24-24V72c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2L98.6 96.6c87.6-86.5 228.7-86.2 315.8 1c87.5 87.5 87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3c-62.2-62.2-162.7-62.5-225.3-1L185 183c6.9 6.9 8.9 17.2 5.2 26.2s-12.5 14.8-22.2 14.8H48.5z">
                </path>
            </svg>
            Trở Về
        </a>
        <button type="submit" class="flex btn text-gray-500 hover:text-sky-800 mx-2 items-center">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right-from-bracket" class="svg-inline--fa fa-arrow-right-from-bracket size-4 me-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z">
                </path>
            </svg>
             Gửi
        </button>
    </div>
</div>
</template>

<script setup>
// Props để nhận dữ liệu từ bên ngoài
const props = defineProps({
    title: {
    type: String,
    default: "Tạo Bài Viết", // Giá trị mặc định
  },
});
</script>

<style lang="">

</style>
