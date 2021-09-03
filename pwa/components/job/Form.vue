<template>
  <v-form>
    <v-container fluid>
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.title"
            :error-messages="titleErrors"
            label="title"
            @input="$v.item.title.$touch()"
            @blur="$v.item.title.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.company"
            :error-messages="companyErrors"
            label="company"
            @input="$v.item.company.$touch()"
            @blur="$v.item.company.$touch()"
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
          <v-text-field
            v-model="item.contactEmail"
            :error-messages="contactEmailErrors"
            label="contactEmail"
            @input="$v.item.contactEmail.$touch()"
            @blur="$v.item.contactEmail.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-combobox
            v-model="item.owner"
            :items="ownerSelectItems"
            :error-messages="ownerErrors"
            no-data-text="No results"
            label="owner"
            item-text="@id"
            item-value="@id"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.location"
            :error-messages="locationErrors"
            label="location"
            @input="$v.item.location.$touch()"
            @blur="$v.item.location.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.locations"
            :error-messages="locationsErrors"
            label="locations"
            @input="$v.item.locations.$touch()"
            @blur="$v.item.locations.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.link"
            :error-messages="linkErrors"
            label="link"
            @input="$v.item.link.$touch()"
            @blur="$v.item.link.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <!-- todo : fix the dateTime format, not supported by default on vuetify -->
        <v-col cols="12" sm="6" md="6">
          <InputDate
            v-model="item.datePublishStart"
            label="datePublishStart"
            :error-messages="datePublishStartErrors"
          />
        </v-col>
      
        <!-- todo : fix the dateTime format, not supported by default on vuetify -->
        <v-col cols="12" sm="6" md="6">
          <InputDate
            v-model="item.datePublishEnd"
            label="datePublishEnd"
            :error-messages="datePublishEndErrors"
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
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.history"
            :error-messages="historyErrors"
            label="history"
            @input="$v.item.history.$touch()"
            @blur="$v.item.history.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-checkbox
            v-model="item.termsAccepted"
            :error-messages="termsAcceptedErrors"
            label="termsAccepted"
            @input="$v.item.termsAccepted.$touch()"
            @blur="$v.item.termsAccepted.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.reference"
            :error-messages="referenceErrors"
            label="reference"
            @input="$v.item.reference.$touch()"
            @blur="$v.item.reference.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.logoRef"
            :error-messages="logoRefErrors"
            label="logoRef"
            @input="$v.item.logoRef.$touch()"
            @blur="$v.item.logoRef.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.template"
            :error-messages="templateErrors"
            label="template"
            @input="$v.item.template.$touch()"
            @blur="$v.item.template.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.uriApply"
            :error-messages="uriApplyErrors"
            label="uriApply"
            @input="$v.item.uriApply.$touch()"
            @blur="$v.item.uriApply.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.uriPublisher"
            :error-messages="uriPublisherErrors"
            label="uriPublisher"
            @input="$v.item.uriPublisher.$touch()"
            @blur="$v.item.uriPublisher.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.publishers"
            :error-messages="publishersErrors"
            label="publishers"
            @input="$v.item.publishers.$touch()"
            @blur="$v.item.publishers.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.atsMode"
            :error-messages="atsModeErrors"
            label="atsMode"
            @input="$v.item.atsMode.$touch()"
            @blur="$v.item.atsMode.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-checkbox
            v-model="item.atsEnabled"
            :error-messages="atsEnabledErrors"
            label="atsEnabled"
            @input="$v.item.atsEnabled.$touch()"
            @blur="$v.item.atsEnabled.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.salary"
            :error-messages="salaryErrors"
            label="salary"
            @input="$v.item.salary.$touch()"
            @blur="$v.item.salary.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.templateValues"
            :error-messages="templateValuesErrors"
            label="templateValues"
            @input="$v.item.templateValues.$touch()"
            @blur="$v.item.templateValues.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.portals"
            :error-messages="portalsErrors"
            label="portals"
            @input="$v.item.portals.$touch()"
            @blur="$v.item.portals.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-checkbox
            v-model="item.draft"
            :error-messages="draftErrors"
            label="draft"
            @input="$v.item.draft.$touch()"
            @blur="$v.item.draft.$touch()"
          />
        </v-col>
      
        <v-col cols="12" sm="6" md="6">
          <v-text-field
            v-model="item.classification"
            :error-messages="classificationErrors"
            label="classification"
            @input="$v.item.classification.$touch()"
            @blur="$v.item.classification.$touch()"
          />
        </v-col>
      </v-row>
      
      <v-row>
        <v-col cols="12" sm="6" md="6">
          <v-checkbox
            v-model="item.deleted"
            :error-messages="deletedErrors"
            label="deleted"
            @input="$v.item.deleted.$touch()"
            @blur="$v.item.deleted.$touch()"
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
import InputDate from '../InputDate';
import { date } from '../../validators/date';

export default {
  name: 'JobForm',
  mixins: [validationMixin],
  components: {
    InputDate,
  },
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
      this.ownerGetSelectItems();
  },
  data: () => ({
      title: null,
      company: null,
      organization: null,
      contactEmail: null,
      owner: null,
      location: null,
      locations: null,
      link: null,
      datePublishStart: null,
      datePublishEnd: null,
      status: null,
      history: null,
      termsAccepted: null,
      reference: null,
      logoRef: null,
      template: null,
      uriApply: null,
      uriPublisher: null,
      publishers: null,
      atsMode: null,
      atsEnabled: null,
      salary: null,
      templateValues: null,
      portals: null,
      draft: null,
      classification: null,
      deleted: null,
  }),
  computed: {
      ...mapFields('user', {
        ownerSelectItems: 'selectItems'
      }),

    // eslint-disable-next-line
    item() {
      return this.initialValues || this.values;
    },

    titleErrors() {
      const errors = [];

      if (!this.$v.item.title.$dirty) return errors;

      has(this.violations, 'title') && errors.push(this.violations.title);


      return errors;
    },
    companyErrors() {
      const errors = [];

      if (!this.$v.item.company.$dirty) return errors;

      has(this.violations, 'company') && errors.push(this.violations.company);


      return errors;
    },
    organizationErrors() {
      const errors = [];

      if (!this.$v.item.organization.$dirty) return errors;

      has(this.violations, 'organization') && errors.push(this.violations.organization);


      return errors;
    },
    contactEmailErrors() {
      const errors = [];

      if (!this.$v.item.contactEmail.$dirty) return errors;

      has(this.violations, 'contactEmail') && errors.push(this.violations.contactEmail);


      return errors;
    },
    ownerErrors() {
      const errors = [];

      if (!this.$v.item.owner.$dirty) return errors;

      has(this.violations, 'owner') && errors.push(this.violations.owner);


      return errors;
    },
    locationErrors() {
      const errors = [];

      if (!this.$v.item.location.$dirty) return errors;

      has(this.violations, 'location') && errors.push(this.violations.location);


      return errors;
    },
    locationsErrors() {
      const errors = [];

      if (!this.$v.item.locations.$dirty) return errors;

      has(this.violations, 'locations') && errors.push(this.violations.locations);


      return errors;
    },
    linkErrors() {
      const errors = [];

      if (!this.$v.item.link.$dirty) return errors;

      has(this.violations, 'link') && errors.push(this.violations.link);


      return errors;
    },
    datePublishStartErrors() {
      const errors = [];

      if (!this.$v.item.datePublishStart.$dirty) return errors;

      has(this.violations, 'datePublishStart') && errors.push(this.violations.datePublishStart);


      return errors;
    },
    datePublishEndErrors() {
      const errors = [];

      if (!this.$v.item.datePublishEnd.$dirty) return errors;

      has(this.violations, 'datePublishEnd') && errors.push(this.violations.datePublishEnd);


      return errors;
    },
    statusErrors() {
      const errors = [];

      if (!this.$v.item.status.$dirty) return errors;

      has(this.violations, 'status') && errors.push(this.violations.status);


      return errors;
    },
    historyErrors() {
      const errors = [];

      if (!this.$v.item.history.$dirty) return errors;

      has(this.violations, 'history') && errors.push(this.violations.history);


      return errors;
    },
    termsAcceptedErrors() {
      const errors = [];

      if (!this.$v.item.termsAccepted.$dirty) return errors;

      has(this.violations, 'termsAccepted') && errors.push(this.violations.termsAccepted);


      return errors;
    },
    referenceErrors() {
      const errors = [];

      if (!this.$v.item.reference.$dirty) return errors;

      has(this.violations, 'reference') && errors.push(this.violations.reference);


      return errors;
    },
    logoRefErrors() {
      const errors = [];

      if (!this.$v.item.logoRef.$dirty) return errors;

      has(this.violations, 'logoRef') && errors.push(this.violations.logoRef);


      return errors;
    },
    templateErrors() {
      const errors = [];

      if (!this.$v.item.template.$dirty) return errors;

      has(this.violations, 'template') && errors.push(this.violations.template);


      return errors;
    },
    uriApplyErrors() {
      const errors = [];

      if (!this.$v.item.uriApply.$dirty) return errors;

      has(this.violations, 'uriApply') && errors.push(this.violations.uriApply);


      return errors;
    },
    uriPublisherErrors() {
      const errors = [];

      if (!this.$v.item.uriPublisher.$dirty) return errors;

      has(this.violations, 'uriPublisher') && errors.push(this.violations.uriPublisher);


      return errors;
    },
    publishersErrors() {
      const errors = [];

      if (!this.$v.item.publishers.$dirty) return errors;

      has(this.violations, 'publishers') && errors.push(this.violations.publishers);


      return errors;
    },
    atsModeErrors() {
      const errors = [];

      if (!this.$v.item.atsMode.$dirty) return errors;

      has(this.violations, 'atsMode') && errors.push(this.violations.atsMode);


      return errors;
    },
    atsEnabledErrors() {
      const errors = [];

      if (!this.$v.item.atsEnabled.$dirty) return errors;

      has(this.violations, 'atsEnabled') && errors.push(this.violations.atsEnabled);


      return errors;
    },
    salaryErrors() {
      const errors = [];

      if (!this.$v.item.salary.$dirty) return errors;

      has(this.violations, 'salary') && errors.push(this.violations.salary);


      return errors;
    },
    templateValuesErrors() {
      const errors = [];

      if (!this.$v.item.templateValues.$dirty) return errors;

      has(this.violations, 'templateValues') && errors.push(this.violations.templateValues);


      return errors;
    },
    portalsErrors() {
      const errors = [];

      if (!this.$v.item.portals.$dirty) return errors;

      has(this.violations, 'portals') && errors.push(this.violations.portals);


      return errors;
    },
    draftErrors() {
      const errors = [];

      if (!this.$v.item.draft.$dirty) return errors;

      has(this.violations, 'draft') && errors.push(this.violations.draft);


      return errors;
    },
    classificationErrors() {
      const errors = [];

      if (!this.$v.item.classification.$dirty) return errors;

      has(this.violations, 'classification') && errors.push(this.violations.classification);


      return errors;
    },
    deletedErrors() {
      const errors = [];

      if (!this.$v.item.deleted.$dirty) return errors;

      has(this.violations, 'deleted') && errors.push(this.violations.deleted);


      return errors;
    },

    violations() {
      return this.errors || {};
    }
  },
  methods: {
      ...mapActions({
        ownerGetSelectItems: 'user/fetchSelectItems'
      }),
  },
  validations: {
    item: {
      title: {
      },
      company: {
      },
      organization: {
      },
      contactEmail: {
      },
      owner: {
      },
      location: {
      },
      locations: {
      },
      link: {
      },
      datePublishStart: {
        date,
      },
      datePublishEnd: {
        date,
      },
      status: {
      },
      history: {
      },
      termsAccepted: {
      },
      reference: {
      },
      logoRef: {
      },
      template: {
      },
      uriApply: {
      },
      uriPublisher: {
      },
      publishers: {
      },
      atsMode: {
      },
      atsEnabled: {
      },
      salary: {
      },
      templateValues: {
      },
      portals: {
      },
      draft: {
      },
      classification: {
      },
      deleted: {
      },
    }
  }
};
</script>
