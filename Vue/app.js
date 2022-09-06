const { createApp } = Vue;
const vapp = createApp({
  data() {
    return {
      users: '',
      email: '',
      password: '',
      usuarioActual: sessionStorage.getItem('name'),
      userName: '',
      userEmail: '',
    };
  },

  methods: {
    login(e) {
      e.preventDefault();
      var incorrecto = true;
      var emailUser = this.email;
      var passwordUser = this.password;
      var access = this.users.map(function (u) {
        if (emailUser === u.email.toLowerCase()) {
          if (passwordUser === u.password) {
            incorrecto = false;
            alert('Acceso correcto');
            window.location.assign('registros.html');
            sessionStorage.setItem('email', emailUser);
            sessionStorage.setItem('name', u.name);
          }
        }
      });

      if (incorrecto)
      alert('Acceso incorrecto');
    },

    saveUser() {
      this.users.push({ name: this.userName, email: this.userEmail }),
      alert('Usuario agregado');
    },
  },
  mounted() {
    fetch('users.json')
      .then((res) => res.json())
      .then((json) => (this.users = json))
      .catch((err) => (console.log(err)));
  },
}).mount('#app');
