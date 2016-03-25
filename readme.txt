=== Better Blockquotes ===

Contributors: @downstairsdev
Tags: blockquotes, tinyMCE
Requires at least: 4.4
Tested up to: 4.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Better Blockquotes provides an way to easily add citations to quotes using the WordPress editor.

== Description ==

Better Blockquotes provides an way to easily add citations to quotes using the WordPress editor. Simply click on the blockquote button, and a pop-up will provide fields for quote, citation and citation link. Developers can extend the plugin to support various blockquote classes.

Contribute or submit bugs via [Github](https://github.com/devinsays/better-blockquotes).

== Installation ==

1. Go to "Plugins > Add New"
2. Search for "Better Blockquotes"
3. Click "Install"

== Frequently Asked Questions ==

= What does the blockquote markup look like? =

`
<blockquote>
This is the quote.
<cite><a href="#">Citation</a></cite>
</blockquote>
`

= Why doesn't my blockquote look good when displayed? =

This plugin doesn't add any styling for blockquotes. Contact the author of your theme to make sure they support blockquote markup.

= Blockquote Classes/Styles =

Developers can optionally add style options to the pop-up. Any selected styles will apply a class directly to the `<blockquote>` element.

`
function prefix_blockquote_classes() {
	$options = array(
		'class-1' => __( 'Style One', 'better-blockquotes' ),
		'class-2' => __( 'Style Two', 'better-blockquotes' ),
	);
	return $options;
}
add_filter( 'betterblockquotes_classes', 'prefix_blockquote_classes' );
`

== Screenshots ==

1. Pop-up that displays when the blockquote button is clicked in the editor.

== Changelog ==

= 1.0.0 (03/25/16) =

* Public Release