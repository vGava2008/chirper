<script setup>
import axios from 'axios';
defineProps(['service']);
</script>
<template>
    Author : {{service.user.name}}
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="updateModel">
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="service_name">
                Service Name
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="service_name"
                type="text"
                placeholder="Brand Name"
                v-model="service.name"
            />
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="description">
                Description
            </label>
            <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="description"
                placeholder="Description"
                style="width: 100%;"
                v-model="service.description"
            ></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">
                Email
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="email"
                type="email"
                placeholder="Enter contact email address"
                v-model="service.email"
            />
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="website">
                Website
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                id="website"
                type="text"
                placeholder="Website"
                v-model="service.web_pages"
            />
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="phone_number">
                Phone Number
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                id="phone_number"
                type="text"
                placeholder="Phone numbers"
                v-model="service.phone_numbers"
            />
        </div>
        <div class="flex items-center justify-between">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="button"
                @click="goBack"
            >
                Go back
            </button>
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit"
            >
                Update
            </button>
        </div>
    </form>
</template>

<script>
export default {
    props: ['service'],

    data() {
        return {
            form: {
                name: '',
                description: '',
                // Добавьте здесь другие поля модели, которые необходимо обновить
            },
            errors: {},
        };
    },

    mounted() {
        this.form = { ...this.service };
    },

    methods: {
        goBack() {
            window.history.back();
        },
        updateModel() {
            axios.put(route('service.update', this.service.id), this.service)
                .then(response => {
                    this.$emit('service-updated', response.data.service);
                    this.form = { ...response.data.service };
                    window.location.href = route('service.show', {'id' :  this.service.id});
                });
        },
    },
};
</script>
