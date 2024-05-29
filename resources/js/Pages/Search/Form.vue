<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
</script>
<template>
    <authenticated-layout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <input id="query" :value="query" type="text">
            <button
            class="btn bg-emerald-500 hover:bg-emerald-400 rounded-md bg-blue-500 text-white text-sm font-medium pl-2 pr-3 py-2 shadow-sm"
            @click="search">Search</button>
            <div class="searchResult">

            </div>
        </div>
    </authenticated-layout>
</template>

<script>
export default {
    props: {
        query: '',
    },
    name: "Form",
    components: {},
    methods: {
        async search() {
            try {
                const response = await axios.post('/searching', { 'query': query.value });
                console.log(response.data);
                if (response.data.length > 0) {
                    for (let resp in response.data) {
                        console.log(response.data[resp])
                    }
                }
            } catch (error) {
                console.error(error);
            }
        }
    }

}
</script>

<style scoped>

</style>
