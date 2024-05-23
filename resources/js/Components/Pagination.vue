<script setup>
const props = defineProps({
   activePage: Number,
   maxPage: Number
});

const emit = defineEmits(['page']);
</script>

<template>
    <div v-if="activePage && maxPage > 1" class="mt-9 mb-3">
       <ul class="flex justify-center gap-x-8">
            <li v-for="page in maxPage">
                <button @click.prevent="emit('page', page)"
                    class="py-2 px-4 border transition-colors duration-300 ease-in hover:text-carbon-900 hover:bg-carbon-50"
                    :class="activePage === page ? 'border-carbon-50' : 'border-carbon-900'"
                >
                    {{page}}
                </button>
            </li>
        </ul>
    </div>
</template>
