( function( api ) {
	// Extends our custom "filmways-lite" section.
	api.sectionConstructor['filmways-lite'] = api.Section.extend( {
		// No events for this type of section.
		attachEvents: function () {},
		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );
} )( wp.customize );