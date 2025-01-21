<template>
    <div>
        <h1>Todo List</h1>
        <ul>
            <li v-for="todo in todos" :key="todo.id">{{ todo.title }}</li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            todos: [{
                title: "minhle",
            }, { title: "todo123" }],
        };
    },
};
</script>

<style scoped>
h1 {
    color: #42b983;
}
</style>