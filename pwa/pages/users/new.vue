<template>
  <div>
    <Toolbar :handle-submit="onSendForm" :handle-reset="resetForm"></Toolbar>
    <UserForm ref="createForm" :values="item" :errors="violations" />
    <Loading :visible="isLoading" />
  </div>
</template>

<script>
import { mapActions } from 'vuex';
import { createHelpers } from 'vuex-map-fields';
import create from '../../mixins/create';

const servicePrefix = 'users';

const { mapFields } = createHelpers({
  getterType: 'user/getField',
  mutationType: 'user/updateField'
});

export default {
  servicePrefix,
  mixins: [create],
  components: {
    Loading: () => import('../../components/Loading'),
    Toolbar: () => import('../../components/Toolbar'),
    UserForm: () => import('../../components/user/Form')
  },
  data: () => ({
    item: {}
  }),
  computed: {
    ...mapFields(['error', 'isLoading', 'created', 'violations'])
  },
  methods: {
    ...mapActions('user', ['create', 'reset'])
  }
};
</script>
