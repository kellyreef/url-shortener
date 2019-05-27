// public\js\url-shortener.js
const $ = window.$

// loads functions when document is ready
jQuery(document).ready(function () {
  $('#slug-label').html(window.location.host + '/')
  generateSlug()
  jQuery('#create').click(function (e) {
    create()
  })
  jQuery('#copy-button').click(function (e) {
    copy()
  })
  jQuery('#create-new').click(function (e) {
    reset()
  })
})

// generate a random slug through the api
function generateSlug () {
  jQuery.ajax({
    url: '/api/v1/generate-slug',
    method: 'get',
    data: {},
    success: function (data) {
      $('#slug').val(data)
    }
  })
}

// create a shortened link
function create () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  })
  // reset errors so user is not confused if new errors occur
  $('#destination-error').html('')
  $('#slug-error').html('')
  // disable the button so that it isn't double clicked
  $('#create').attr('disabled', true)
  // create a shortened link through the api
  jQuery.ajax({
    url: '/api/v1/shortlink',
    method: 'post',
    data: {
      slug: jQuery('#slug').val(),
      destination: jQuery('#destination').val()
    },
    success: function (data) {
      var url = window.location.host + '/' + data.slug
      // hide the input
      $('#slug-input').hide()
      // show the created url with copy button
      $('#results').show()
      $('#slug-display').html(url)
      // show created confirmation
      $('#create-success').html('Created')
    },
    // display validation errors if it occurs
    error: function (xhr, textStatus, errorThrown) {
      $('#create').attr('disabled', false)
      var errors = xhr.responseJSON.errors
      if (errors.destination) {
        // replace all instances of destination with url
        $('#destination-error').html(errors.destination[0].replace('destination', 'url'))
      }
      if (errors.slug) {
        $('#slug-error').html(errors.slug[0])
      }
    }
  })
}

// copy the shortened link to the clipboard
function copy () {
  $('<textarea/>').appendTo('body').val($('#slug-display').text()).select().each(function () {
    document.execCommand('copy')
  }).remove()
  $('#copy-success').html('Copied to Clipboard')
}

// reset the form to create another link
function reset () {
  generateSlug()
  $('#create-success').html('')
  $('#slug-input').show()
  $('#destination').val('')
  $('#destination-error').html('')
  $('#copy-success').html('')
  $('#slug-error').html('')
  $('#results').hide()
  $('#create').attr('disabled', false)
}
