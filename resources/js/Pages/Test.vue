<template>

    Filtered Dishes: {{ filtered_dishes }}

    <div v-for="dish in dishes">

        {{ dish.name }}

    </div>

    <div>
        <input type="text" name="filter" id="filter_dishes"
        v-model="filtered_dishes"
        @:input="filterDishes(filtered_dishes, dishes)">
    </div>

</template>

<script>
// show list of dishes

// add input filter dishes

// on click to dish show description
import {
    getDishes
} from './api';
export default {
    created () {
        let dishes = getDishes();
    },
    data: function() {
        return {
            dishes: getDishes(),
            filtered_dishes: '',
        };
    },
    methods: {
        filterDishes(filtered_dishes, dishes) {
            console.log(dishes[0])
            console.log(filtered_dishes);
        }
    }
}

</script>

<style scoped>

</style>

