<template>
  <v-form>
    <v-container fluid>
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.username"
            :error-messages="usernameErrors"
            label="username"
            @input="$v.item.username.$touch()"
            @blur="$v.item.username.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.role"
            :error-messages="roleErrors"
            label="role"
            @input="$v.item.role.$touch()"
            @blur="$v.item.role.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.profile"
            :error-messages="profileErrors"
            label="profile"
            @input="$v.item.profile.$touch()"
            @blur="$v.item.profile.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.email"
            :error-messages="emailErrors"
            label="email"
            @input="$v.item.email.$touch()"
            @blur="$v.item.email.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.organization"
            :error-messages="organizationErrors"
            label="organization"
            @input="$v.item.organization.$touch()"
            @blur="$v.item.organization.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-checkbox
            v-model="item.draft"
            :error-messages="draftErrors"
            label="draft"
            @input="$v.item.draft.$touch()"
            @blur="$v.item.draft.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.status"
            :error-messages="statusErrors"
            label="status"
            @input="$v.item.status.$touch()"
            @blur="$v.item.status.$touch()"
          />
        </v-col>
      
        <v-col cols="12"></v-col>
      </v-row>
      
    </v-container>
  </v-form>
</template>

<script>
import has from 'lodash/has';
import { validationMixin } from 'vuelidate';
import { required } from 'vuelidate/lib/validators';
import { mapActions } from 'vuex';
import { mapFields } from 'vuex-map-fields';

export default {
  name: 'UserForm',
  mixins: [validationMixin],
  props: {
    values: {
      type: Object,
      required: true
    },

    errors: {
      type: Object,
      default: () => {}
    },

    initialValues: {
      type: Object,
      default: () => {}
    }
  },
  mounted() {
  },
  data: () => ({
      username: null,
      role: null,
      profile: null,
      email: null,
      organization: null,
      draft: null,
      status: null,
  }),
  computed: {

    // eslint-disable-next-line
    item() {
      return this.initialValues || this.values;
    },

    usernameErrors() {
      const errors = [];

      if (!this.$v.item.username.$dirty) return errors;

      has(this.violations, 'username') && errors.push(this.violations.username);


      return errors;
    },
    roleErrors() {
      const errors = [];

      if (!this.$v.item.role.$dirty) return errors;

      has(this.violations, 'role') && errors.push(this.violations.role);


      return errors;
    },
    profileErrors() {
      const errors = [];

      if (!this.$v.item.profile.$dirty) return errors;

      has(this.violations, 'profile') && errors.push(this.violations.profile);


      return errors;
    },
    emailErrors() {
      const errors = [];

      if (!this.$v.item.email.$dirty) return errors;

      has(this.violations, 'email') && errors.push(this.violations.email);


      return errors;
    },
    organizationErrors() {
      const errors = [];

      if (!this.$v.item.organization.$dirty) return errors;

      has(this.violations, 'organization') && errors.push(this.violations.organization);


      return errors;
    },
    draftErrors() {
      const errors = [];

      if (!this.$v.item.draft.$dirty) return errors;

      has(this.violations, 'draft') && errors.push(this.violations.draft);


      return errors;
    },
    statusErrors() {
      const errors = [];

      if (!this.$v.item.status.$dirty) return errors;

      has(this.violations, 'status') && errors.push(this.violations.status);


      return errors;
    },

    violations() {
      return this.errors || {};
    }
  },
  methods: {
  },
  validations: {
    item: {
      username: {
      },
      role: {
      },
      profile: {
      },
      email: {
      },
      organization: {
      },
      draft: {
      },
      status: {
      },
    }
  }
};
</script>
