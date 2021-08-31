import { Model } from "@vuex-orm/core";

export default class Job extends Model {
  static entity= 'jobs';

  static fields(){
    return {
      id: this.attr(null),
      title: this.attr(null),
      company: this.attr(null)
    }
  }
}
