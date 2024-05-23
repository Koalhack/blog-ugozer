<script setup>
   const props = defineProps({
       response: Object
   });
</script>

<template>
    <div v-if="response" class="flex justify-between mt-9 px-4 py-3 rounded-sm border border-carbon-300 bg-carbon-900">
        <span>{{response.data.state}}</span>
        <p class="text-carbon-200">{{response.data.success || response.data.error || ''}}</p>
    </div>
</template>
