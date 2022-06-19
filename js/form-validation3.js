$(function() {
    $("form[name='unos']").validate({
      rules: {
        title: {
            required: true,
            minlength: 3,
            maxlength: 30,
        },
        ksadrzaj: {
            required: true,
            minlength: 10,
            maxlength: 100,
        },
        content: {
            required: true,
            maxlength: 50,
        },
        photo: {
            required: true,
        },
        category: {
            required: true,
        },
      },

      messages: {
        title: {
            required: "Potrebno je upisati naslov vijesti",
            minlength: "Naslov vijesti mora imati više od 3 znaka",
            maxlength: "Naslov vijesti mora imati manje od 30 znakova",
        },
        ksadrzaj: {
            required: "Potrebno je upisati kratki sadrzaj",
            minlength: "Kratki sadržaj mora imati više od 10 znakova",
            maxlength: "Kratki sadržaj mora imati manje od 100 znakova",
        },
        content: {
            required: "Potrebno je upisati sadržaj",
        },
        photo: {
            required: "Potrebno je odabrati sliku",
        },
        category: {
            required: "Potrebno je odabrati kategoriju",
        }
     },
     
      submitHandler: function(form) {
        form.submit();
      }
    });
  });