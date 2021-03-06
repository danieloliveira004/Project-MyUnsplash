$(document).ready(() => {
  // VARIAVEIS
  let description = '';
  let url = '';
  let id;

  // SEARCG
  $('#glass-button').on('click', () => {
    bodyOverflow(true);
    $('#search').addClass('visible');
  });

  // ADD PHOTO
  $('#add-photo').on('click', () => {
    $('#cadastro').addClass('visible');
    bodyOverflow(true);
  });

  // CANCEL
  $('.cancel').on('click', e => {
    if ($('.visible')[0])
      bodyOverflow(false);
    $('.visible').removeClass('visible');
  })

  // SUBMIT -> AUTHORIZE 
  $('#cadastro form').on('submit', e => {
    e.preventDefault();
   
    description = $('#description').val();
    url = $('#url').val();
    op = 1;
   
    $('.visible').removeClass('visible');
    $('#autenticar').addClass('visible');
  });

  // AUTORIZAR
  $("#autenticar form").on('submit', e => {
    e.preventDefault();
    let password = $("#password").val();
    $.post('autenticar.php', `senha=${password}`, date => {
      if (date == 'valido') {
        $('.error').removeClass('hidden');

        $('.cancel').trigger('click');
        // ADICIONAR IMAGEM
        if (op == 1)
          $.ajax({
            type: 'post',
            url: 'cadastrar.php',
            data: `description=${description}&url=${url}`,
            beforeSend: retorno(true),
            success: data => {
              if (data == 'error')
                retorno(false, 400);
              else {
                retorno(false, 200);
                carregarImagens();
              }
            },
            error: error => retorno(false, 400)
          });
        else
          // EXCLUIR
          $.ajax({
            type: 'post',
            url: 'deletar.php',
            data: `id=${id_img}`,
            beforeSend: retorno(true),
            success: data => {
              if (data == 'error')
                retorno(false, 400);
              else {
                retorno(false, 201);
                $(`#${id_img}`).parent().remove();
              }
            },
            error: error => retorno(false, 400)
          });
      }
      else {
        if ($('.error').hasClass('hidden')) {
          $('.error').fadeToggle('2000');
          $('.error').fadeToggle('2000');
        }
        else
          $('.error').addClass('hidden');
      }
    })
  })

  // PESQUISA
  $('#search form').on('submit', e => {
    e.preventDefault();
    $('.container-grid').load('buscar.php', { pesquisa: $('#search input').val() }, function (response, status, http) {
      if (status == 'success') {
        if (response == '') {
          carregarImagens();
          retorno(false, 202);
        }
        else
          retorno(false);
      }
      if (status == 'error') 
        retorno(false, 400);
      
    })
    
  });

  $('.header form').on('submit', e => {
    e.preventDefault();
    let html = $('.container-grid').html();
    $('.container-grid').load('buscar.php', { pesquisa: $('.header input').val() }, function (response, status, http) {
      if (status == 'success') {
        if (response == '') {
          carregarImagens();
          retorno(false, 202);
        }
        else
          retorno(false);
      }
      if (status == 'error') {
        retorno(false, 400);
      }
    })
  });

  // CARREGAR IMAGENS 
  carregarImagens();
});//FIM DO READY

// DELETE
function deletar(id) {
  $('#autenticar').addClass('visible');
  bodyOverflow(true);
  op = 2;
  id_img = id;
}

// CARREGAR HTML DAS IMAGENS
function carregarImagens() {
  retorno(true);
  $(".container-grid").load('carregamento.php', function (response, status, http) {
    if (status == 'success' && response != 'erro') {
      retorno(false);
    }
    else {
      $('.container-grid').html('');
      retorno(false, 400);
    }
  });
}

// MOSTRAR RETORNO
function retorno(bool, type = null) {
  if (bool) {
    $('#loading').addClass('visible');
    bodyOverflow(true);
  }
  else {
    $('#loading').removeClass('visible');
    bodyOverflow(false);
  }
  // 200 - SUCESS - FOTO ADICIONADA COM SUCESSO!
  // 201 - SUCESS - FOTO EXCLUIDA COM SUCESSO!
  // 202- SUCESS - POREM SEM RESULTADOS!
  // 400 ERROR
  if (type) {
    bodyOverflow(true);
    switch (type) {
      case 200:
        var h3 = "Added Photo !";
        var p = "Image successfully created the gallery !";
        break;
      case 201:
        var h3 = "Deleted Photo !";
        var p = "Image successfully deleted from gallery !";
        break;
      case 202:
          $('input').blur();
          var h3 = "No Result!";
          var p = "Couldn't find anything related to your search, try other words!";
        break;
      case 400:
        var h3 = "Unexpected Error !";
        var p = "There was an error, we'll take care of it soon !";
        break;
    }
    $('body').append(`
      <aside id="retorno">
        <div class="container-aviso">
          <div class="container-form">
            <h3>${h3}</h3>
            <p>${p}</p>
            <div class="buttons">
              <button class="submit cancel">Ok</button>
              <button class="icon-x cancel">X</button>
            </div>
          </div>
        </div>
      </aside>
    `);
    $('#retorno .cancel').on('click', () => {
      $("#retorno").remove();
      bodyOverflow(false);
    });
  }
}

// LIMPAR
function limpar_grids() {
  $('.container-grid').html('');
}

// BODY OVERFLOS
function bodyOverflow(bool) {
  if (bool)
  {
    $(document).scrollTop(0);
    $('body').css('overflow', 'hidden');
  }
  else {
    if(!$('#retorno')[0])
      $('body').css('overflow', 'visible'); 
  }
}
