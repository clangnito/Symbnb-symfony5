$('#add-image').click(function () {
    // récupère le numéro des futurs champs qui vont être créés
    var index =  +$('#widgets-counter').val();  // récupère le prototype des entrées

    var tmpl = $('#ad_images').data('prototype').replace(/__name__/g, index); // injecte ce code au sein de la div

    $('#ad_images').append(tmpl);
    $('#widgets-counter').val(index + 1); //gère le bouton supprimer

    handleDeleteButtons();
  });

  function handleDeleteButtons() {
    $('button[data-action="delete"]').click(function () {
      var target = this.dataset.target;   
      $(target).remove();
    });
  }

  function updateCounter() {
    var count = +$('#ad_images div.form-group').length;
    $('#widgets-counter').val(count);
  }

  updateCounter();

  handleDeleteButtons();