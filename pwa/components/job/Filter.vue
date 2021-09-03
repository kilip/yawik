<template>
  <v-container fluid>
  </v-container>
</template>

<script>

export default {
  name: 'JobFilter',
  props: {
    values: {
      type: Object,
      required: true
    }
  },
  mounted() {
  },

  computed: {
    // eslint-disable-next-line
    item() {
      return this.initialValues || this.values;
    }
  },
  methods: {
  }
};
</script>
