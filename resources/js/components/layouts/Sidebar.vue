<template>
<div class="w-auto bg-gray-900 h-screen overflow-y-auto">
    <div class="w-full text-white py-3 px-3 hover:bg-gray-800 border-b border-gray-600">
        <a class="flex items-center uppercase " href="/">
            <img alt="Picture of the author" loading="lazy" width="50" height="50" decoding="async" data-nimg="1" class="rounded-full mr-2" style="color:transparent" src="https://admin.minhthuhandmade.com/images/logo_handmade.jpg">
            <span class="">Minh Thư Handmade</span>
        </a>
    </div>
    <ul class="w-full">
        <li class="w-full text-white py-3 ps-3 hover:bg-gray-800">
            <a title="Trang chủ" class="flex items-center" href="/">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="table-cells-large" class="svg-inline--fa fa-table-cells-large mr-2 size-5" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M448 96V224H288V96H448zm0 192V416H288V288H448zM224 224H64V96H224V224zM64 288H224V416H64V288zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z">
                    </path>
                </svg>
                <span class="">Trang chủ</span>
            </a>
            <ul class="nav-children w-full bg-gray-900 overflow-hidden">
            </ul>
        </li>
    </ul>
</div>
</template>

<script>
export default {
    name: "Sidebar",
};
</script>

<style lang="">

</style>
