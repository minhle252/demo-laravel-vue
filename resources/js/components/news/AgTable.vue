<template>
  <div class="ag-theme-alpine w-full h-screen">
    <ag-grid-vue class="ag-theme-alpine" :rowData="props.rowData" :columnDefs="props.columnDefs" :modules="modules"
      :defaultColDef="defaultColDef" :pagination="true" :paginationPageSize="50"
      rowModelType="clientSide"></ag-grid-vue>
  </div>
</template>

<script setup>
import { AgGridVue } from "ag-grid-vue3";
import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-alpine.css";
import { ref } from "vue";

const defaultColDef = ref({
  editable: false,
  sortable: true,
  flex: 1,
  minWidth: 100,
  filter: true,
  floatingFilter: true,
});
const props = defineProps({
  columnDefs: {
    type: Array,
    default: () => [],
  },
  rowData: {
    type: Array,
    default: []
  },
});

</script>

<style>
/* Thêm class cho theme AG Grid */
.ag-theme-alpine {
  height: 400px;
  width: 100%;
}
</style>
