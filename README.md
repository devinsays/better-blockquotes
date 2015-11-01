## Better Blockquotes

The standard WordPress editor has no option for blockquotes with citations. This plugin solves that problem. It replaces the standard button with a pop-up and fields for "quote", "citation" and "citation link". This information is then inserted into the post using proper HTML5 blockquote markup.

Potentially, this could be added as an enhancement to WordPress core. If text is selected and the button is clicked, it could maintain the same functionality (text wrapped in blockquotes). Otherwise, the pop-up is shown. This plugin would need some additional updates to support that though- at the moment it just shows the pop-up.

### Requirements

* WordPress 4.3 or higher

### TODO

* Maintain existing tinyMCE button functionality when text is selected
* Populate fields automatically in pop-up if blockquote text is selected

### Frequently Asked Questions

#### What does the blockquote markup look like?

```
<blockquote>
This is the quote.
<cite><a href="#">Citation</a></cite>
</blockquote>
```

#### Why doesn't my blockquote look good when displayed?

This plugin doesn't add any styling for blockquotes. Contact the author of your theme to make sure they support blockquote markup.

#### Is this plugin on the WordPress repo?

Not yet. Still in beta.

#### What is Gruntfile.js and package.json used for?

This is how translation files (.pot) are built. If you have Grunt installed and need to generate a new translation file, just run `npm install` and then `grunt`. If i18n is not needed for your project, feel free to remove.