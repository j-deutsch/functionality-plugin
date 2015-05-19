(function() {
    tinymce.PluginManager.add('jd_tc_button', function(editor, url) {
        editor.addButton('jd_tc_button', {
            icon: 'icon dashicons-book',
            text: 'Books List',
            onclick: function() {
                editor.windowManager.open({
                    title: 'Insert Tooltip',
                    body: [{
                        type: 'textbox',
                        name: 'textboxtooltipName',
                        label: 'Genre(s)',
                        value: ''
                    },  ],
                    onsubmit: function(e) {
                        editor.insertContent(
                            '[jd_books  genres=&quot;' +
                            e.data.textboxtooltipName +
                            '&quot;]'
                        );
                    }
                });
            }
        });
    });
})();