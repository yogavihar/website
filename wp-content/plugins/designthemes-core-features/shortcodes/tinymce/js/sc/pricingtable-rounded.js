scnShortcodeMeta = {
	attributes : [ 
	 {
		label : "Columns",
		id : "content",
		controlType : "column-control"
	} ],
	customMakeShortcode : function(b) {
		var a = b.data;

		var colors = ['chocolate','green','lightgreen','blue','pink','darkpink', 'red','purple','ocean','slateblue','skyblue','coral','khaki','cyan','grey','gold','raspberry','electricblue','eggplant','ferngreen','palebrown'];

		if (!a)
			return "";
		b = a.numColumns;
		var c = a.content;
		a = [ "0", "one", "two", "three", "four", "five", 'six' ];
		var x = [ "0", "0", "half", "third", "fourth", "fifth", 'sixth' ];
		var f = x[b];
		c = c.split("|");
		var g = "";
		for ( var h in c) {
			var d = jQuery.trim(c[h]);
			if (d.length > 0) {
				var e = a[d.length] + '_' + f;
				if (b == 4 && d.length == 2)
					e = "one_half";

				var z = e;
				var selected = "";
				if (h == 0) {
					e += " first";
					selected = "selected";
				}

				var variation = colors[Math.floor(Math.random() * colors.length)];

				g += "<br>[dt_sc_"
						+ e
						+ "] "
						+ "<br>[dt_sc_pricing_table_item variation='"+variation+"' heading='gift'  button_text='Buy Now' button_link='#' currency='$' price1='15' price2='.85' "
						+ selected + "]<br>" 
						+"[dt_pricing_round_text title='Full Circle' subtitle='2 Person' text='Gift your loved ones a dinner at affordable price' /]"	
						+ "<br>[/dt_sc_pricing_table_item]<br>" + " [/dt_sc_" + z
						+ "] <br/>";
			}
		}

		return "[dt_sc_pricing_table ]<br>" + g + "<br>[/dt_sc_pricing_table]";
	}
};