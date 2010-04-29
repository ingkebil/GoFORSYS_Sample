/*
	Simple AutoComplete plugin for jQuery
	Author: Wellington Ribeiro
	Version: 1.0.0 (14/03/2010 12:02)
	Copyright (c) 2008-2010 IdealMind ( www.idealmind.com.br )
	Licensed under the GPL license (http://www.idealmind.com.br/projetos/simple-autocomplete/#license)

 *
 * TODO : Não permitir que o autocomplete do navegador atrapalhe
 * 
 * $('selector').simpleAutoComplete("ajax_query.php", {
 *	identifier: 'estado',
 *	extraParamFromInput: '#extra',
 *	attrCallBack: 'rel',
 *	autoCompleteClassName: 'autocomplete',
 *	selectedClassName: 'sel'
 * },calbackFunction);
 * 
 */

(function($){
	$.fn.extend(
	{
		simpleAutoComplete: function( page, options, callback )
		{
			if(typeof(page) == "undefined" )
			{
				alert("simpleAutoComplete: Você deve especificar a página que processará a consulta.");
			}
			
			var classAC = 'autocomplete';
			var selClass = 'sel';
			var attrCB = 'rel';
			var thisElement = $(this);
			
			thisElement.keyup(function( ev )
			{
				var getOptions = { query: thisElement.val() }
				
				if( typeof(options) == "object" )
				{
					classAC = typeof( options.autoCompleteClassName ) != "undefined" ? options.autoCompleteClassName : classAC;
					selClass = typeof( options.selectedClassName ) != "undefined" ? options.selectedClassName : selClass;
					
					attrCB = typeof( options.attrCallBack ) != "undefined" ? options.attrCallBack : attrCB;
					if( typeof( options.identifier ) == "string" )
					getOptions.identifier = options.identifier;

					if( typeof( options.extraParamFromInput ) != "undefined" )
					getOptions.extraParam = $( options.extraParamFromInput ).val();
				}

				kc = ( ( typeof( ev.charCode ) == 'undefined' || ev.charCode === 0 ) ? ev.keyCode : ev.charCode );
				key = String.fromCharCode(kc);

				//console.log(kc, key, ev );

				if (kc == 27)
				{
					$('div.' + classAC).remove();
				}
				if (kc == 13)
				{
					$('div.' + classAC + ' li.' + selClass).trigger('click');
				}
				if (key.match(/[a-zA-Z0-9_\- ]/) || kc == 8 || kc == 46)
				{
					$.get(page, getOptions, function(r)
					{
						$('div.' + classAC).remove();
						autoCompleteList = $('<div>').addClass(classAC).html(r);
						if (r != '')
						{
							autoCompleteList.insertAfter(thisElement);

							if (navigator.appVersion.match('MSIE 6')){
								$('div.' + classAC).css({
									'margin': thisElement.css('height') + ' 0px auto -' + thisElement.css('width')
								});
								$('div.' + classAC + ' ul').css({
									'margin-left': '0px'
								})
							}
							
							$('div.' + classAC + ' li').each(function( n, el )
							{
								el = $(el);
								el.mouseenter(function(){
									$('div.' + classAC + ' li.' + selClass).removeClass(selClass);
									$(this).addClass(selClass);
								});
								el.click(function()
								{
									thisElement.attr('value', el.text());

									if( typeof( callback ) == "function" )
										callback( el.attr(attrCB).split('_') );
									
									$('div.' + classAC).remove();
									thisElement.focus();
								});
							});
						}
					});
				}
				if (kc == 38 || kc == 40){
					if ($('div.' + classAC + ' li.' + selClass).length == 0)
					{
						if (kc == 38)
						{
							$($('div.' + classAC + ' li')[$('div.' + classAC + ' li').length - 1]).addClass(selClass);
						} else {
							$($('div.' + classAC + ' li')[0]).addClass(selClass);
						}
					}
					else
					{
						sel = false;
						$('div.' + classAC + ' li').each(function(n, el)
						{
							el = $(el);
							if ( !sel && el.hasClass(selClass) )
							{
							el.removeClass(selClass);
							$($('div.' + classAC + ' li')[(kc == 38 ? (n - 1) : (n + 1))]).addClass(selClass);
							sel = true;
							}
						});
					}
				}
				if (thisElement.val() == '')
				{
					$('div.' + classAC).remove();
				}
			});
		}
	});
})(jQuery);