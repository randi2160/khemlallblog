( function( api ) {

	// Extends our custom "ample-construction" section.
	api.sectionConstructor['ample-construction'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
