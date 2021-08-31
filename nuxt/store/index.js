import Vue from "vue";
import Vuex from 'vuex';
import VuexORM from '@vuex-orm/core';
import VuexORMAxios from '@vuex-orm/plugin-axios';
import Job from '@/model/job';

Vue.use(Vuex);
VuexORM.use(VuexORMAxios, {
  baseUrl: "https://localhost",
  dataTransformer: ({data}) => {
    return data['hydra:member'];
  }
});

const database = new VuexORM.Database();

database.register(Job)

export const plugins = [
  VuexORM.install(database)
];
