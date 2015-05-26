scnShortcodeMeta = {
	attributes : [
			{
				label : "Type",
				id : "type",
				help : "",
				controlType : "select-control",
				selectValues : [ 'type1' ,'type2' ,'type3','type4'],
				defaultValue : 'type1',
				defaultText : 'type1'
			},
	
			{
				label : "Align",
				id : "align",
				help : "",
				controlType : "select-control",
				selectValues : [ '','left' ,'right' ,'center'],
				defaultValue : '',
				defaultText : 'Select'
			},

			{
				label : "Custom Text Color",
				id : "textcolor",
				help : 'Or you can also choose your own color to use as the text color',
				controlType : "color-control"
			},
			{
				label : "Cite Name",
				id : "cite",
				help : 'This is the name of the author.',
				controlType : "text-control"
			}],
	defaultContent : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ac luctus ligula. Phasellus a ligula blandit",
	shortcode : "dt_sc_blockquote"
};