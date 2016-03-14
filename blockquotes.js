/*
 * Adds a new custom blockquote button.
 * If text is selected, the button will toggle blockquote markup around the selection.
 * If no text is selected, a pop-up will display options for quote, citation, citation link.
 */

(function() {
    tinymce.PluginManager.add( 'better_blockquote', function( editor, url ) {

		editor.addButton( 'better_blockquote', {
            title: better_blockquotes.add_blockquote,
            type: 'button',
            icon: 'blockquote',
            onclick: function() {

				// If text is selected, toggle blockquote markup
	            if ( editor.selection.getContent() ) {

					editor.formatter.toggle('blockquote');

				// If no text is selected, display pop-up
	            } else {

					// Standard fields to display in blockquote pop-up
		            var body = [
					    {
					        type: 'textbox',
					        name: 'quote',
					        label: better_blockquotes.quote,
					        multiline: true,
					        minWidth: 300,
							minHeight: 100
					    },
						{
					        type: 'textbox',
					        name: 'cite',
					        label: better_blockquotes.citation,
					    },
						{
					        type: 'textbox',
					        name: 'link',
					        label: better_blockquotes.citation_link,
					    },
					];

					// Display classes dropdown in pop-up if defined
					if ( better_blockquotes.class_options ) {
						var class_options = [];
						for ( var key in better_blockquotes.class_options ) {
							class_options.push({ 'value': key, 'text' : better_blockquotes.class_options[key] });
						}

						body.push({
					        type: 'listbox',
					        name: 'class',
					        label: better_blockquotes.class,
					        values : class_options
					    });
					}

					editor.windowManager.open({
					    title: better_blockquotes.blockquote,
					    body: body,
					    onsubmit: function( e ) {
						    var blockquote = '';
						    var cite = '';

							if ( e.data.link && e.data.cite ) {
								cite = '<cite><a href="' + e.data.link + '">' + e.data.cite + '</a></cite>';
	              			} else if ( !e.data.link && e.data.cite ) {
				  				cite = '<cite>' + e.data.cite + '</cite>';
	              			}

	  						if ( e.data.quote ) {
		  						if ( e.data.class ) {
			  						blockquote += '<blockquote class="' + e.data.class + '">';
		  						} else {
			  						blockquote += '<blockquote>';
		  						}
	  							blockquote += e.data.quote;
	  							blockquote += cite;
	  							blockquote += '</blockquote>';
						    }

					        editor.insertContent(blockquote);

					    }
					});

				}
			}
        });

    });
})();
