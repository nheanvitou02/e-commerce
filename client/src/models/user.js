export default class User {
  constructor(name, email, password, message, password_confirmation) {
    this.name = name;
    this.email = email;
    this.password = password;
    this.message = message;
    this.password_confirmation = password_confirmation;
  }
}
