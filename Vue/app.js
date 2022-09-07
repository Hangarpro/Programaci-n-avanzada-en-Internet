const { createApp } = Vue;
const vapp = createApp({
  data() {
    return {
      users: '',
      email: '',
      password: '',
      usuarioActual: sessionStorage.getItem('name'),
      userName: '',
      userAcc: '',
      userEmail: '',
      userPhone: '',
      userWeb: '',
      userStreet: '',
      userSuite: '',
      userCity: '',
      userZip: '',
      mostrar: true,
      total: 10,
      idEditar: '',
      registro: true,
      userData: {
        id: '',
        name: '',
        username: '',
        password: '',
        email: '',
        address: {
          street: '',
          suite: '',
          city: '',
          zipcode: '',
        },
        phone: '',
        website: '',
      },
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
      this.users.push({ id: this.total + 1,
                        name: this.userName,
                        username: this.userAcc,
                        password: this.password,
                        email: this.userEmail,
                        address: {
                          street: this.userStreet,
                          suite: this.userSuite,
                          city: this.userCity,
                          zipcode: this.userZip,
                        },
                        phone: this.userPhone,
                        website: this.userWeb,
                      }),
      alert('Usuario agregado');
      this.mostrar = true;
      this.total += 1;
    },

    editUser() {
      this.userData = {
        id: this.idEditar + 1,
        name: this.userName,
        username: this.userAcc,
        password: this.password,
        email: this.userEmail,
        address: {
          street: this.userStreet,
          suite: this.userSuite,
          city: this.userCity,
          zipcode: this.userZip,
        },
        phone: this.userPhone,
        website: this.userWeb,
      };
      this.users[this.idEditar] = this.userData;
      alert('Usuario editado');
      this.mostrar = true;
    },

    cancelar() {
      this.mostrar = true;
    },

    deleteUser(id) {
      this.users = this.users.filter((user) => user.id !== id);
      alert('Usuario eliminado');
    },

    editForm(id) {
      this.mostrar = false;
      this.registro = false;
      this.idEditar = id - 1;
    },

    añadir() {
      this.mostrar = false;
      this.registro = true;
    },
  },
  mounted() {
    fetch('users.json')
      .then((res) => res.json())
      .then((json) => (this.users = json))
      .catch((err) => (console.log(err)));
  },
}).mount('#app');
