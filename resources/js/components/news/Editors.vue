<script setup>
import { ref, computed, watch } from 'vue';
import { ClassicEditor, Essentials, Paragraph, Bold, Italic } from 'ckeditor5';
import { Ckeditor } from '@ckeditor/ckeditor5-vue';

import 'ckeditor5/ckeditor5.css';

// Props để nhận dữ liệu từ bên ngoài
const props = defineProps({
    des: {
        type: String,
        default: '',
    },
    licenseKey: {
        type: String,
        default: import.meta.env.VITE_EDITOR_TOKEN
    },
    toolbarOptions: {
        type: Array,
        default: () => ['undo', 'redo', '|', 'bold', 'italic'],
    },
});

const emit = defineEmits(['update:des']);
console.log(import.meta.env.VITE_EDITOR_TOKEN);

const editorData = ref(props.des);

const config = computed(() => {
    return {
        licenseKey: props.licenseKey,
        plugins: [Essentials, Paragraph, Bold, Italic],
        toolbar: props.toolbarOptions,
    };
});

// Đồng bộ dữ liệu v-model
watch(editorData, (newValue) => {
    emit('update:des', newValue);
});
</script>

<template>
    <ckeditor
        v-model="editorData"
        :editor="ClassicEditor"
        :config="config"
        class="h-10"
    />
</template>
