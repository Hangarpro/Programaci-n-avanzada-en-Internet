const { createApp } = Vue;
const vapp = createApp({
  data() {
    return {
      username: '',
      password: '',
      usuarioActual: sessionStorage.getItem('name'),
      movies: null,
      movieDetails: '',
      id: sessionStorage.getItem('id'),
      genero: '',
      year: '',
      rating: '0.5',
      usuarioID: sessionStorage.getItem('userID'),
      rateStatus: sessionStorage.getItem('rate'),
      movieRating: sessionStorage.getItem('rating'),

    };
  },

  methods: {
    login(e) {
      e.preventDefault();
      var data = new FormData();
      data.append('username', this.username);
      data.append('password', this.password);
      data.append('request_token', '');

      var config = {
        method: 'post',
        url: 'https://api.themoviedb.org/3/authentication/token/' +
        'validate_with_login?api_key=cb7cbd51e680ebdaf2bdca4ec29c45bd',
        headers: {
          //...data.getHeaders(),
        },
        data: data,
      };

      axios(config)
      .then(function (response) {
        console.log(JSON.stringify(response.data));
        window.location.assign('registros.html');
      })
      .catch(function (error) {
        console.log(error);
        alert('Los datos introducidos son incorrectos');
      });

      sessionStorage.setItem('name', this.username);

    },

    deleteRate() {
      var config = {
        method: 'delete',
        url: 'https://api.themoviedb.org/3/movie/' + this.id +
        '/rating?api_key=cb7cbd51e680ebdaf2bdca4ec29c45bd',
        headers: {
          Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjYjdjYmQ1MWU' +
          '2ODBlYmRhZjJiZGNhNGVjMjljNDViZCIsInN1YiI6IjYzMWJiMzg5NTQ1MDhkMDA3Z' +
          'TliNDYzZSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.TrggYNlo' +
          '3fYFnnudfTV7p4oIu3Tr9BHopkNt8BpZ5mQ',
        },
      };

      axios(config)
      .then(function (response) {
        console.log(JSON.stringify(response.data));
        sessionStorage.setItem('rate', false);
      })
      .catch(function (error) {
        console.log(error);
      });

    },

    rateMovie() {
      var data = new FormData();
      data.append('value', this.rating);

      var config = {
        method: 'post',
        url: 'https://api.themoviedb.org/3/movie/' + this.id +
        '/rating?api_key=cb7cbd51e680ebdaf2bdca4ec29c45bd',
        headers: {
          Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjYjdjYmQ1M' +
          'WU2ODBlYmRhZjJiZGNhNGVjMjljNDViZCIsInN1YiI6IjYzMWJiMzg5NTQ1MDhkMDA' +
          '3ZTliNDYzZSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.TrggYN' +
          'lo3fYFnnudfTV7p4oIu3Tr9BHopkNt8BpZ5mQ',

          // ...data.getHeaders(),
        },
        data: data,
      };

      axios(config)
      .then(function (response) {
        console.log(JSON.stringify(response.data));
      })
      .catch(function (error) {
        console.log(error);
      });

    },

    prueba() {
      console.log(this.rating);
    },

    getID(id) {
      sessionStorage.setItem('id', id);
      window.location.assign('movie.html');
    },

    getMovie(id) {
      let _this = this;
      var config = {
        method: 'get',
        url: 'https://api.themoviedb.org/3/movie/' + id +
        '?api_key=cb7cbd51e680ebdaf2bdca4ec29c45bd&language=es-MX',
        headers: { },
      };

      axios(config)
      .then(function (response) {
        _this.movieDetails = response.data;
        _this.movieDetails.poster_path = 'https://image.tmdb.org/t/p/' +
        'w220_and_h330_face' + _this.movieDetails.poster_path;
        console.log(_this.movieDetails);
        _this.genero = _this.movieDetails.genres[0].name;
        _this.year = _this.movieDetails.release_date.substr(0, 4);
      })
      .catch(function (error) {
        console.log(error);
      });
    },

    getUserID() {
      var config = {
        method: 'get',
        url: 'https://api.themoviedb.org/3/account?api_key=cb7cbd51e680ebdaf2' +
        'bdca4ec29c45bd',
        headers: {
          Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjYjdjYmQ1MWU' +
          '2ODBlYmRhZjJiZGNhNGVjMjljNDViZCIsInN1YiI6IjYzMWJiMzg5NTQ1MDhkMDA3Z' +
          'TliNDYzZSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.TrggYNlo' +
          '3fYFnnudfTV7p4oIu3Tr9BHopkNt8BpZ5mQ',
        },
      };

      axios(config)
      .then(function (response) {
        console.log(JSON.stringify(response.data));
        sessionStorage.setItem('userID', response.data.id);
      })
      .catch(function (error) {
        console.log(error);
      });
    },

    getRate(id) {
      var config = {
        method: 'get',
        url: 'https://api.themoviedb.org/3/account/14694648/rated/movies?api_' +
        'key=cb7cbd51e680ebdaf2bdca4ec29c45bd&language=es-MX&sort_by=created_' +
        'at.asc&page=1',
        headers: {
          Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjYjdjYmQ1MWU' +
          '2ODBlYmRhZjJiZGNhNGVjMjljNDViZCIsInN1YiI6IjYzMWJiMzg5NTQ1MDhkMDA3Z' +
          'TliNDYzZSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.TrggYNlo' +
          '3fYFnnudfTV7p4oIu3Tr9BHopkNt8BpZ5mQ',
        },
      };

      axios(config)
      .then(function (response) {
        rateStatus = false;
        let overview = '';
        for (let i = 0; i < response.data.results.length; i++) {
          if (response.data.results[i].id == id) {
            rateStatus = true;
            sessionStorage.setItem('rating', response.data.results[i].rating);
          }
        }

        sessionStorage.setItem('rate', rateStatus);
        console.log(rateStatus);
      })
      .catch(function (error) {
        console.log(error);
      });

    },
  },
  mounted() {
    let _this = this;
    var config = {
      method: 'get',
      url: 'https://api.themoviedb.org/3/movie/popular' +
      '?api_key=cb7cbd51e680ebdaf2bdca4ec29c45bd&language=es-MX&page=1',
      headers: { },
    };

    axios(config)
    .then(function (response) {
      _this.movies = response.data.results;
      _this.movies.forEach(pelicula =>
      pelicula.poster_path = 'https://image.tmdb.org/t/p/w220_and_h330_face'
      + pelicula.poster_path);
    })
    .catch(function (error) {
      console.log(error);
    });

    if (this.id != null) {
      this.getMovie(this.id);
      this.getRate(this.id);
    }

    if (this.usuarioActual != null) {
      this.getUserID();
    }
  },
}).mount('#app');
