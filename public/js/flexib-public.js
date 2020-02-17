(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

})( jQuery );

/* This section of the code registers a new block, sets an icon and a category, and indicates what type of fields it'll include. */
  
wp.blocks.registerBlockType('brad/border-box', {
	title: 'Simple Box',
	icon: 'smiley',
	category: 'common',
	attributes: {
	  content: {type: 'string'},
	  color: {type: 'string'}
	},
	
  /* This configures how the content and color fields will work, and sets up the necessary elements */
	
	edit: function(props) {
	  function updateContent(event) {
		props.setAttributes({content: event.target.value})
	  }
	  function updateColor(value) {
		props.setAttributes({color: value.hex})
	  }
	  return React.createElement(
		"div",
		null,
		React.createElement(
		  "h3",
		  null,
		  "Simple Box"
		),
		React.createElement("input", { type: "text", value: props.attributes.content, onChange: updateContent }),
		React.createElement(wp.components.ColorPicker, { color: props.attributes.color, onChangeComplete: updateColor })
	  );
	},
	save: function(props) {
	  return wp.element.createElement(
		"h3",
		{ style: { border: "3px solid " + props.attributes.color } },
		props.attributes.content
	  );
	}
  })
