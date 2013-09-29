/*
			TOOLTIP
		*/

		$( document ).ready( function()
		{
			var targets = $( '.tooltip' ),
				target	= false,
				tooltip = false,
				title	= false;

			targets.bind( 'mouseenter', function()
			{
				target	= $( this );
				tip		= target.attr( 'title' );
				tooltip	= $( '<div id="tooltip"></div>' );

				if( !tip || tip == '' )
					return false;

				target.removeAttr( 'title' );
				tooltip.css( 'opacity', 0 )
					   .html( tip )
					   .appendTo( 'body' );

				var init_tooltip = function()
				{
					if( $( window ).width() < tooltip.outerWidth() * 1.5 )
						tooltip.css( 'max-width', $( window ).width() / 2 );
					else
						tooltip.css( 'max-width', 340 );

					var pos_left = target.offset().left + ( target.outerWidth() / 2 ) - ( tooltip.outerWidth() / 2 ),
						pos_top	 = target.offset().top - tooltip.outerHeight() - 20;

					if( pos_left < 0 )
					{
						pos_left = target.offset().left + target.outerWidth() / 2 - 20;
						tooltip.addClass( 'left' );
					}
					else
						tooltip.removeClass( 'left' );

					if( pos_left + tooltip.outerWidth() > $( window ).width() )
					{
						pos_left = target.offset().left - tooltip.outerWidth() + target.outerWidth() / 2 + 20;
						tooltip.addClass( 'right' );
					}
					else
						tooltip.removeClass( 'right' );

					if( pos_top < 0 )
					{
						var pos_top	 = target.offset().top + target.outerHeight();
						tooltip.addClass( 'top' );
					}
					else
						tooltip.removeClass( 'top' );

					tooltip.css( { left: pos_left, top: pos_top } )
						   .animate( { top: '+=10', opacity: 1 }, 50 );
				};

				init_tooltip();
				$( window ).resize( init_tooltip );

				var remove_tooltip = function()
				{
					tooltip.animate( { top: '-=10', opacity: 0 }, 50, function()
					{
						$( this ).remove();
					});

					target.attr( 'title', tip );
				};

				target.bind( 'mouseleave', remove_tooltip );
				tooltip.bind( 'click', remove_tooltip );
			});
		});

		/*
			---
		*/
		
		/*
			VIEWPORT BUG FIX
			iOS viewport scaling bug fix, by @mathias, @cheeaun and @jdalton
		*/
		
		( function( doc )
		{
			var addEvent = 'addEventListener',
			    type	 = 'gesturestart',
			    qsa		 = 'querySelectorAll',
			    scales	 = [ 1, 1 ],
			    meta	 = qsa in doc ? doc[ qsa ]( 'meta[name=viewport]' ) : [];
		
			function fix()
			{
				meta.content = 'width=device-width,minimum-scale=' + scales[ 0 ] + ',maximum-scale=' + scales[ 1 ];
				doc.removeEventListener( type, fix, true );
			}
		
			if( ( meta = meta[ meta.length - 1 ] ) && addEvent in doc )
			{
				fix();
				scales = [ .25, 1.6 ];
				doc[ addEvent ]( type, fix, true );
			}
		
		}( document ) );