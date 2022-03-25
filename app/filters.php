<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

add_filter('comment_form_default_fields', function ($fields) {
    $fields['author'] = '<p class="comment-form-author"><input id="author" name="author" type="text" value="" size="30" maxlength="245" required placeholder="你的昵称"/></p>';
    $fields['email']  = '<p class="comment-form-email"><input id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" required placeholder="你的Email"/></p>';
    $fields['url'] = '';
    $fields['cookies'] = '';
    return $fields;
});

add_filter('comment_form_defaults', function ($defaults) {
    $defaults['comment_notes_before'] = '';
    $defaults['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" name="comment" class="required" rows="4" placeholder="写下你的评论…"></textarea></p>';
    return $defaults;
});
