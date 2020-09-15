(function ($) {

  $.loadmodal = function (options) {

    // allow a simple url to be sent as the single option
    if ($.type(options) == 'string') {
      options = {
        url: options,
      };//options
    }//if

    // set the default options
    options = $.extend(true, {
      url: null,                               // a convenience place to specify the url - this is moved into ajax.url

      id: 'jquery-loadmodal-js',               // the id of the modal

      idBody: 'jquery-loadmodal-js-body',      // the id of the modal-body (the dialog content)

      appendToSelector: 'body',                // the element to append the dialog <div> code to.  Normally, this should be left as the 'body' element.

      title: window.document.title || 'Dialog',// the title of the dialog

      width: '400px',                          // 20%, 400px, or other css width

      dlgClass: 'fade',                        // CSS class(es) to add to the <div class="modal"> main dialog element.  This default makes the dialog fade in.

      size: 'modal-lg',                        // CSS class(es) to specify the dialog size ('modal-lg', 'modal-sm', '').  The default creates a large dialog.  See the Bootstrap docs for more info.

      closeButton: false,                       // whether to have an 'X' button at top right to close the dialog

      buttons: {                               // set titles->functions to add buttons to the bottom of the dialog
      },//buttons                              // return false from the function to prevent the automatic closing of the dialog

      modal: {                                 // options sent into $().modal (see Bootstrap docs for .modal and its options)
      },//modal

      ajax: {                                  // options sent into $.ajax (see JQuery docs for .ajax and its options)
        url: null,                             // required (for convenience, you can specify url above instead)
      },//ajax

      beforeShow: null,                        // This method is called at the beginning of the default success method.  If this method
      // returns false (an explicit false), the default success method is canceled and not run.  You can also define
      // normal ajax success methods in the ajax options above, but these are called *after* the
      // modal is shown.  This method allows you to handle the response before the modal is called.

      onShow: null,                            // if set, this function will be called with a reference to the dialog once it has been
      // successfully shown.  You can also listen for modal events, but be aware that show.bs.modal
      // triggers *before* the content is added to .modal-body.
      bgClass: 'secondary',
    }, options);


    // ensure we have a url
    options.ajax.url = options.ajax.url || options.url;
    if (!options.ajax.url) {
      throw new Error('$().loadmodal requires a url.');
    }//if

    // close any dialog with this id first
    $('#' + options.id).modal('hide');

    // create our own success responder for the ajax
    options.ajax.success = $.isArray(options.ajax.success) ? options.ajax.success : options.ajax.success ? [options.ajax.success] : [];
    options.ajax.success.unshift(function (data, status, xhr) { // unshift puts this as the first success method
      // call the beforeShow method if there is one, and cancel if it returns false
      if (options.beforeShow && options.beforeShow(data, status, xhr) === false) {
        return;
      }//if

      // create the modal html
      var judul = options.title;
      var submitClass = judul.replace(/\s+/gi, '-').toLowerCase();
      var div = $([
        //'<div id="responsive" class="modal ' + options.dlgClass + '" data-keyboard="true" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="modalLabel' + options.bgClass + '">',
        '<div id="responsive" class="modal ' + options.dlgClass + '" data-keyboard="true" data-backdrop="static" role="dialog" aria-labelledby="modalLabel' + options.bgClass + '">',
        '  <div class="modal-dialog ' + options.size + '" role="document">',
        '      <div class="modal-content">',
        '        <div class="modal-header ' + options.bgClass + '">',
        options.closeButton ? '          <button class="close" data-dismiss="modal" type="button">x</button>' : '',
        '          <h4 class="modal-title" id="modalLabel' + options.bgClass + '">' + options.title + '</h4>',
        '        </div>',
        '        <div id="' + options.idBody + '" class="modal-body">',
        '        </div>',
        '        <div class="modal-footer">',
        '           <button class="btn btn-sm btn-secondary tutup-modal" data-dismiss="modal"><i class="fa fa-ban"></i> Tutup</button>',
        '           <button type="button" class="btn btn-info btn-sm kirim-modal btn-' + options.bgClass + ' submit-' + submitClass + '" style="' + options.deeStel + '"><i class="fa fa-refresh fa-spin loading" style="display:none;"></i><i class="fa fa-save"></i> ' + options.title + '</button>',
        '        </div>',
        '      </div>',
        '    </div>',
        '  </div>',
      ].join('\n'));

      // add the new modal div to the body and show it!
      $(options.appendToSelector).append(div);
      div.find('.modal-body').html(data);
      div.modal(options.modal);
      div.find('.modal-dialog').css('width', options.width);

      // add buttons to the dialog, if any
      if (!$.isEmptyObject(options.buttons)) {
        div.find('.modal-body').append('<div class="button-panel"></div>');
        var button_class = 'btn btn-primary';
        $.each(options.buttons, function (key, func) {
          var button = $('<button class="' + button_class + '">' + key + '</button>');
          div.find('.button-panel').append(button);
          button.on('click.button-panel', function (evt) {
            var closeDialog = true; // any button closes the dialog
            if (func && func(evt) === false) {  // run the callback
              closeDialog = false; // an explicit false returned from the callback stops the dialog close
            }//if
            if (closeDialog) {
              div.modal('hide');
            }//if
          });//click
          button_class = 'btn btn-default';  // only the first is the primary
        });//each
      }//if

      // event to remove the content on close
      div.on('hidden.bs.modal', function (e) {
        div.removeData();
        div.remove();
      });

      // call the onShow function if there is one
      if (options.onShow) {
        options.onShow(div);
      }//if

    });//unshift (add success method)

    // load the content from the server
    $.ajax(options.ajax);

  };//loadmodal top-level function

})(jQuery);
