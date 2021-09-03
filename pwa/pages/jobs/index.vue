<template>
  <div class="p-4 content-start justify-items-center">
    <div v-for="job in items" class="flex-col justify-center max-w-xl bg-white shadow-xl rounded-md mb-4">
      <div class="flex p-2">
        <div class="flex w-32 content-center align-middle justify-center">
          <img
            :alt="job.company"
            :src="`https://localhost/media/resolve/organization_image/`+job.organization.image.id" v-if="job.organization && job.organization.image"
            style="max-height: 48px;"
          />
        </div>
        <div class="flex-col w-full ml-2">
          <span class="block text-base">{{job.title}}</span>
          <span class="block text-sm">{{ job.company }}, {{ job.location }}</span>
        </div>
        <div class="flex-col w-16 justify-end h-full p-0">
          <button class="text-xs block bg-indigo-900 ml-2 p-2 mt-1 text-white font-bold">
            apply
          </button>
        </div>
      </div>
    </div>
    <div class="flex">
      <button v-on:click="movePrevious" class="bg-blue-900 w-16 p-2 mr-2 text-white text-xs">Previous</button>
      <button v-on:click="moveNext" class="bg-blue-900 w-16 p-2 text-white text-xs">Next</button>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import { mapFields } from 'vuex-map-fields';
import list from '../../mixins/list';

export default {
  servicePrefix: 'jobs',
  mixins: [list],
  components: {
    Toolbar: () => import('../../components/Toolbar'),
    ActionCell: () => import('../../components/ActionCell'),
    JobFilterForm: () => import('../../components/job/Filter'),
    DataFilter: () => import('../../components/DataFilter')
  },
  data: () => ({
    headers: [
      { text: 'title', value: 'title' },
      { text: 'company', value: 'company' },
      { text: 'organization', value: 'organization' },
      { text: 'contactEmail', value: 'contactEmail' },
      { text: 'owner', value: 'owner' },
      { text: 'location', value: 'location' },
      { text: 'locations', value: 'locations' },
      { text: 'link', value: 'link' },
      { text: 'datePublishStart', value: 'datePublishStart' },
      { text: 'datePublishEnd', value: 'datePublishEnd' },
      { text: 'status', value: 'status' },
      { text: 'history', value: 'history' },
      { text: 'termsAccepted', value: 'termsAccepted' },
      { text: 'reference', value: 'reference' },
      { text: 'logoRef', value: 'logoRef' },
      { text: 'template', value: 'template' },
      { text: 'uriApply', value: 'uriApply' },
      { text: 'uriPublisher', value: 'uriPublisher' },
      { text: 'publishers', value: 'publishers' },
      { text: 'atsMode', value: 'atsMode' },
      { text: 'atsEnabled', value: 'atsEnabled' },
      { text: 'salary', value: 'salary' },
      { text: 'templateValues', value: 'templateValues' },
      { text: 'portals', value: 'portals' },
      { text: 'draft', value: 'draft' },
      { text: 'classification', value: 'classification' },
      { text: 'deleted', value: 'deleted' },
      {
        text: 'Actions',
        value: 'action',
        sortable: false
      }
    ],
    selected: []
  }),
  async fetch({store}){
    await store.dispatch("job/fetchAll");
  },
  computed: {
    ...mapGetters('job', {
      items: 'list'
    }),
    ...mapFields('job', {
      deletedItem: 'deleted',
      error: 'error',
      isLoading: 'isLoading',
      resetList: 'resetList',
      totalItems: 'totalItems',
      view: 'view'
    })
  },
  methods: {
    async moveNext(){
      const cpage = this.options.page;
      this.options.page = this.options.page + 1;
      this.resetList = true;
      this.fetchAll({page: this.options.page });
    },
    movePrevious(){
      if(this.options.page > 1){
        this.resetList = true;
        this.options.page = this.options.page - 1;
        this.fetchAll({page: this.options.page });
      }
    },
    ...mapActions('job', {
      fetchAll: 'fetchAll',
      deleteItem: 'del'
    })
  },
};
</script>
