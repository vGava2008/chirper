<script setup>
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';


dayjs.extend(relativeTime);

const props = defineProps(['service']);

</script>
<template>
<!--    <div class="max-w-md mx-auto bg-white rounded shadow-md">-->
        <!-- Заголовок -->
        <div class="bg-gray-800 text-white py-4 px-6 rounded-t">
            <h2 class="text-xl font-bold">{{ service.name }}</h2>
        </div>

        <!-- Блок изображений -->
        <div class="grid grid-cols-4 gap-2 p-4">
            <img v-for="image in images" :src="image.url" :alt="image.alt" class="w-full h-auto rounded" />
        </div>

        <!-- Описание -->
        <div class="p-4">
            <p>{{ service.description }}</p>
        </div>

        <!-- Номера телефонов -->
        <div class="p-4"
        v-if="JSON.parse(service.phone_numbers.length) > 0">
            Phone numbers:
            <p v-for="phone_number in JSON.parse(service.phone_numbers)">{{ phone_number }}</p>
        </div>

        <!-- Мета информация -->
        <div class="bg-gray-100 p-4 rounded-b">
            <div class="text-sm">
                <span class="text-gray-600">Автор:</span>
                <span class="text-gray-800">{{ service.user.name }}</span>
            </div>
            <div class="text-sm">
                <span class="text-gray-600">Дата:</span>
                <span class="text-gray-800">{{ service.updated_at }}</span>
            </div>
            <!-- Другие поля мета информации -->
        </div>
    <div class="flex items-center justify-between">
        <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="button"
            @click="goBack"
        >
            Go back
        </button>
        <a :href="route('service.edit', service.id)">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="button"
            >
                Edit
            </button>
        </a>
    </div>
<!--    </div>-->
</template>

<script>
export default {
    data() {
        return {
            images: [
                { url: 'https://www.planetware.com/wpimages/2020/02/france-in-pictures-beautiful-places-to-photograph-eiffel-tower.jpg', alt: 'Eiffel Tower' },
                { url: 'https://www.planetware.com/wpimages/2020/02/france-in-pictures-beautiful-places-to-photograph-mont-st-michel.jpg', alt: 'Mont Saint-Michel' },
                { url: 'https://www.planetware.com/wpimages/2020/02/france-in-pictures-beautiful-places-to-photograph-versailles-gardens.jpg', alt: 'Versailles Gardens' },
                { url: 'https://www.planetware.com/wpimages/2020/02/france-in-pictures-beautiful-places-to-photograph-chateau-de-chenonceau.jpg', alt: 'Château de Chenonceau\n' },
                { url: 'https://www.planetware.com/wpimages/2020/02/france-in-pictures-beautiful-places-to-photograph-st-tropez-street.jpg', alt: 'Saint-Tropez' },
            ],
        };
    },
    methods: {
        goBack() {
            window.history.back();
        },
    }
};
</script>
