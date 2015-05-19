(function() {
    tinymce.PluginManager.add('custom_mce_button', function(editor, url) {
        editor.addButton('custom_mce_button', {
            icon: ‘false’,
            text: 'Tooltip',
            onclick: function() {
                editor.windowManager.open({
                    title: 'Insert Tooltip',
                    body: [{
                        type: 'textbox',
                        name: 'textboxtooltipName',
                        label: 'Tooltip Text',
                        value: ''
                    }, {
                        type: 'listbox',
                        name: 'className',
                        label: 'Position',
                        values: [{
                            text: 'Top Tooltip',
                            value: 'top_tooltip'
                        }, {
                            text: 'Left Tooltip',
                            value: 'left_tooltip'
                        }, {
                            text: 'Right Tooltip',
                            value: 'right_tooltip'
                        }, {
                            text: 'Bottom Tooltip',
                            value: 'bottom_tooltip'
                        }]
                    }, ],
                    onsubmit: function(e) {
                        editor.insertContent(
                            '[tooltip class=&quot;' +
                            e.data.className +
                            '&quot; title=&quot;' +
                            e.data.textboxtooltipName +
                            '&quot;]' +
                            editor.selection
                            .getContent() +
                            '[/tooltip]'
                        );
                    }
                });
            }
        });
    });
})();