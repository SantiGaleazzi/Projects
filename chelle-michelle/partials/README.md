# Partials

**This directory is not required, you can delete it if you don't want to use it.**

This directory contains your WordPress theme partials files.
Partials let you define custom components or pieces of files that can be shared across your WordPress site.

## Passing Data to partials

You can use `get_template_part()` this function recibes three parameters:

1. String $slug
2. String $name = null
3. Array $args = array()

The third param, `Array $args` is the one receiving all the information. The structure inside the array depends on your creativity and not necessarily from having a certain structure.

# Example

### Calling the function

```
  <?php

    get_template_part('partials/lightbox', null, array(
      'type' => 'video',
      'data' => array(
        'post_id' => $post->ID,
        'title' => get_the_title(),
        'description' => get_field('lightbox_description'),
        'css_classes' => 'text-red-500 text-2xl'
      )
    ));

  ?>
```

### Partial

```
  <div id="<?= $args['data']['post_id']; ?>" class="lightbox">
    <div class="dismiss absolute inset-0 backdrop-blur-md bg-gradient-to-bl from-red-500/80 to-black/60 "></div>
    <div class="content w-full max-w-3xl relative z-10">
      <button aria-label="Close lightbox" class="dismiss w-8 h-8 text-white flex items-center justify-center bg-black absolute rounded-full -top-10 right-0 cursor-pointer">
        <i class="fa-solid fa-xmark"></i>
      </button>

      <?php if ( $args['type'] === 'video' ) : ?>
        <div class="has-video rounded-lg">
          <div class="<?= $args['data']['css_classes']; ?>">
            <?= $args['data']['title']; ?>
          </div>

          <div class="text-black">
            <?= $args['data']['title']; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
```
