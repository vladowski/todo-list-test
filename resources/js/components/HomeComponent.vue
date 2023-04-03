<template>
    <div>
        <h1>To-Do List</h1>

        <form @submit.prevent="addItem">
            <input v-model="newItemTitle" placeholder="New item title" />
            <button type="submit">Add Item</button>
        </form>

        <ul>
            <li v-for="item in items" :key="item.id">
                <input type="checkbox" v-model="item.completed" @change="updateItem(item)" />
                <span :class="{ completed: item.completed }">{{ item.title }}</span>
                <button @click="removeItem(item)">Remove Item</button>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            items: [],
            newItemTitle: '',
        };
    },
    methods: {
        async addItem() {
            const response = await axios.post('/api/todo-items', {
                title: this.newItemTitle,
            });

            this.items.push(response.data.item);
            this.newItemTitle = '';
        },

        async removeItem(item) {
            await axios.delete(`/api/todo-items/${item.id}`);

            const index = this.items.indexOf(item);
            this.items.splice(index, 1);
        },

        async updateItem(item) {
            await axios.put(`/api/todo-items/${item.id}`, {
                completed: item.completed,
            });
        },

        async fetchItems() {
            const response = await axios.get('/api/todo-items');
            this.items = response.data;
        },
    },

    async created() {
        await this.fetchItems();
    },
};
</script>

<style>
.completed {
    text-decoration: line-through;
}
</style>

