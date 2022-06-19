$(function() {
    $("form[name='registracija']").validate({
      rules: {

        ime: {
            required: true,
            minlength: 3,
        },
        prezime: {
            required: true,
            minlength: 3,
        },
        username: {
            required: true,
            minlength: 3,
        },
        password1: {
        required: true,
        minlength: 3,
        },
        password2:{
        required: true,
        equalTo: "#password1",
        }
      },

      messages: {
        ime: {
            required: "Potrebno je upisati ime",
            minlength: "Ime nesmije biti kraće od 3 znaka",
        },
        prezime: {
            required: "Potrebno je upisati prezime",
            minlength: "Prezime nesmije biti kraće od 3 znaka",
        },
        username: {
            required: "Potrebno je upisati korisničko ime",
            minlength: "Korisničko ime nesmije biti kraće od 3 znaka",
        },
        password1: {
            required: "Potrebno je upisati lozinku",
        },
        password2: {
            required: "Potrebno je ponoviti lozinku",
            equalTo: "Lozinke moraju biti iste",
        },
     },
     
      submitHandler: function(form) {
        form.submit();
      }
    });
  });