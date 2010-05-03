$('document').ready(function () {
$('fieldset legend a ').each(function () {
  $(this).append('&nbsp;').prepend('&nbsp;');
});
});
