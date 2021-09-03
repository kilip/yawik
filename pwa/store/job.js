import jobsService from "../services/job";
import makeCrudModule from "./crud";

export default makeCrudModule({
  service: jobsService,
});
