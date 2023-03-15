import axios from 'axios';

const API_URL = 'http://127.0.0.1:8000/api/';

class AuthService {
  login(user) {
    return axios
      .post(API_URL + 'login', {
        email: user.email,
        password: user.password
      })
      .then(response => {
        if (response.data.token) {
          localStorage.setItem('user', JSON.stringify(response.data));
        }
        return response.data.user;
      });
  }

  logout() {
    localStorage.removeItem('user');
    localStorage.removeItem('wishlist');
    localStorage.removeItem('cart');
  }

  register(user) {
    return axios.post(API_URL + 'register', user).then(response => {
      if (response.data.token) {
        localStorage.setItem('user', JSON.stringify(response.data));
      }
      return response.data.user;
    });
  }
}

export default new AuthService();