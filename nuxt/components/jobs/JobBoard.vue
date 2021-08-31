<template>
  <div class="p-8">
    <div v-if="jobs.entities !== undefined" class="w-full flex-col lg:max-w-full lg:flex">
      <div
        v-for="job in jobs.entities.jobs"
        :key="job.id"
        class="bg-white p-4 mb-8 rounded shadow-md"
      >
        <div class="mb-8">
          <div class="text-gray-900 font-bold text-xl mb-2">{{ job.title }}</div>
          <p class="text-gray-700 text-base">
            {{ job.company }}, {{ job.id }}
          </p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Job from "~/model/job";

export default {
  name: 'JobBoard',
  fetchOnServer: false,
  data(){
    return {
      jobs: []
    }
  },
  async fetch(){
    this.jobs = await Job.api().get('https://localhost/jobs/active');
  },
  head(){
    return {
      title: 'Job Board'
    }
  }
}
</script>
