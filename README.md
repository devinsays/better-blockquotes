## Better Blockquotes

The standard WordPress editor does not provide any easy way to add blockquotes with citations. This plugin solves that problem. If no text is selected when the button is clicked, a pop-up provides fields for "quote", "citation" and "citation link". This information is then inserted into the post using proper HTML5 blockquote markup.

Potentially, this could be added as an enhancement to WordPress core. If text is selected, the button maintains the same functionality as the current blockquote button. The pop-up fields only appear when no text is selected.

![A screenshot of the Better Blockquotes pop-up window.](https://github.com/devinsays/better-blockquotes/raw/master/screenshot-1.png)

### Requirements

* WordPress 4.3 or higher

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