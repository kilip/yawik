<template>
  <div class="relative flex item-top justify-around min-h-screen bg-gray-100">
    <JobBoard/>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'
import JobBoard from "~/components/jobs/JobBoard.vue";

export default Vue.extend({
  components: {JobBoard}

})
</script>
