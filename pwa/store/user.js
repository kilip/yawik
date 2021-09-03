import usersService from "../services/user";
import makeCrudModule from "./crud";

export default makeCrudModule({
  service: usersService,
});
