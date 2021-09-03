<template>
  <div class="user-list">
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import { mapFields } from 'vuex-map-fields';
import list from '../../mixins/list';

export default {
  servicePrefix: 'users',
  mixins: [list],
  components: {
    Toolbar: () => import('../../components/Toolbar'),
    ActionCell: () => import('../../components/ActionCell'),
    UserFilterForm: () => import('../../components/user/Filter'),
    DataFilter: () => import('../../components/DataFilter')
  },
  async fetch({store}){
    await store.dispatch('user/fetchAll');
  },
  data: () => ({
    headers: [
      { text: 'username', value: 'username' },
      { text: 'role', value: 'role' },
      { text: 'profile', value: 'profile' },
      { text: 'email', value: 'email' },
      { text: 'organization', value: 'organization' },
      { text: 'status', value: 'status' },
      {
        text: 'Actions',
        value: 'action',
        sortable: false
      }
    ],
    selected: []
  }),
  computed: {
    ...mapGetters('user', {
      items: 'list'
    }),
    ...mapFields('user', {
      deletedItem: 'deleted',
      error: 'error',
      isLoading: 'isLoading',
      resetList: 'resetList',
      totalItems: 'totalItems',
      view: 'view'
    })
  },
  methods: {
    ...mapActions('user', {
      fetchAll: 'fetchAll',
      deleteItem: 'del'
    })
  }
};
</script>
