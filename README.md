## Better Blockquotes

The standard WordPress editor has no option for blockquotes with citations. This plugin solves that problem. It replaces the standard button with a pop-up and fields for "quote", "citation" and "citation link". This information is then inserted into the post using proper HTML5 blockquote markup.

### Requirements

* WordPress 4.3 or higher

### TODO

* Make all strings translatable
* Auto-populate "quote" field in pop-up with selected text
* Test with custom post types

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