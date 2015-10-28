/*
 * Adds a new custom blockquote button.
 * When clicked, a pop-up will display options for quote, citation, citation link.
 *
 * @TODO Make strings translatable
 */

(function() {
    tinymce.PluginManager.add( 'better_blockquote', function( editor, url ) {

		editor.addButton( 'better_blockquote', {
            title: 'Add Blockquote',
            type: 'button',
            icon: 'blockquote',
            onclick: function() {

				editor.windowManager.open({
				    title: 'Blockquote',
				    body: [
				    {
				        type: 'textbox',
				        name: 'quote',
				        label: 'Quote',
				        multiline: true,
				        minWidth: 300,
						minHeight: 100
				    },
					{
				        type: 'textbox',
				        name: 'cite',
				        label: 'Citation',
				        text : "Hello"
				    },
					{
				        type: 'textbox',
				        name: 'link',
				        label: 'Citation Link',
				    },
				    ],
				    onsubmit: function( e ) {

					    var blockquote = '';
					    var cite = '';

						if ( e.data.cite ) {
							cite += e.data.cite;
						}

					    if ( e.data.link && e.data.cite ) {
							cite = '<a href="' + e.data.link + '">' + cite + '</a>';
						}

						if ( e.data.cite ) {
							cite = '<cite>' + e.data.cite + '</cite>';
						}

						if ( e.data.quote ) {
							blockquote += '<blockquote>';
							blockquote += e.data.quote;
							blockquote += cite;
							blockquote += '</blockquote>';
					    }

				        editor.insertContent(blockquote);

				    }
				});
			}
        });

    });
})();