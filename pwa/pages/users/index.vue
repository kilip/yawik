<template>
  <div class="user-list font-sans">
    <div>
      <div>
        <div class="flex flex-col lg:w-6">
          <div class="flex-col" v-for="user in items">
            <p>{{ user.username }} - {{ user.profile['firstName'] }} {{ user.profile['lastName']}}</p>
            <img
              v-if="user.profile.image"
              :src="'https://localhost/media/resolve/user_image/' + user.profile.image.id"
              width="48"
            />
          </div>
        </div>
      </div>
    </div>
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
