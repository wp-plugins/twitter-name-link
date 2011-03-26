// image: url + "/img/tweetname_button.png"

function tweetlink_insert() {
	twitname_select = tinyMCE.activeEditor.selection.getContent();
    tinyMCE.activeEditor.selection.setContent('[twitname]' + twitname_select + '[/twitname]');
}

(function() {

    tinymce.create('tinymce.plugins.tweetlink_insert', {

        init : function(ed, url){
            ed.addButton('tweetlink_name', {
                title : 'Insert twitter name with a link',
                onclick : function() {
                    ed.execCommand(
                        'mceInsertContent',
                        false,
                        tweetlink_insert()
                        );
                },
                image: url + "/img/tweetname_button.png"
            });
        },
		getInfo : function() {
			return {
				longname : 'Twitter Name Insert Plugin',
				author : 'Andrew Norcross',
				authorurl : 'http://andrewnorcross.com',
				infourl : '',
				version : "1.0"
			};
		}
	});

    tinymce.PluginManager.add('tweetlink_name', tinymce.plugins.tweetlink_insert);
    
})();